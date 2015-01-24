<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
if ( session_status() == PHP_SESSION_NONE ) {
    session_start();
}
 
require_once( APPPATH . 'libraries/facebook/Facebook/GraphObject.php' );
require_once( APPPATH . 'libraries/facebook/Facebook/GraphSessionInfo.php' );
require_once( APPPATH . 'libraries/facebook/Facebook/FacebookSession.php' );
require_once( APPPATH . 'libraries/facebook/Facebook/FacebookCurl.php' );
require_once( APPPATH . 'libraries/facebook/Facebook/FacebookHttpable.php' );
require_once( APPPATH . 'libraries/facebook/Facebook/FacebookCurlHttpClient.php' );
require_once( APPPATH . 'libraries/facebook/Facebook/FacebookResponse.php' );
require_once( APPPATH . 'libraries/facebook/Facebook/FacebookSDKException.php' );
require_once( APPPATH . 'libraries/facebook/Facebook/FacebookRequestException.php' );
require_once( APPPATH . 'libraries/facebook/Facebook/FacebookAuthorizationException.php' );
require_once( APPPATH . 'libraries/facebook/Facebook/FacebookRequest.php' );
require_once( APPPATH . 'libraries/facebook/Facebook/FacebookRedirectLoginHelper.php' );
 
use Facebook\GraphSessionInfo;
use Facebook\FacebookSession;
use Facebook\FacebookCurl;
use Facebook\FacebookHttpable;
use Facebook\FacebookCurlHttpClient;
use Facebook\FacebookResponse;
use Facebook\FacebookAuthorizationException;
use Facebook\FacebookRequestException;
use Facebook\FacebookRequest;
use Facebook\FacebookSDKException;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\GraphObject;
 
class Facebook {
    var $ci;
    var $helper;
    var $session;
 
    public function __construct() {
        $this->ci =& get_instance();
 
        FacebookSession::setDefaultApplication( $this->ci->config->item('api_id', 'facebook'), $this->ci->config->item('app_secret', 'facebook') );
        $this->helper = new FacebookRedirectLoginHelper( $this->ci->config->item('redirect_url', 'facebook') );
 
        if ( $this->ci->session->userdata('fb_token') ) {
            $this->session = new FacebookSession( $this->ci->session->userdata('fb_token') );
 
            // Validate the access_token to make sure it's still valid
            try {
                if ( ! $this->session->validate() ) {
                  $this->session = false;
                }
            } catch ( Exception $e ) {
                // Catch any exceptions
                $this->session = false;
            }
        } else {
            try {
                $this->session = $this->helper->getSessionFromRedirect();
            } catch(FacebookRequestException $ex) {
                print_r($ex);
                // When Facebook returns an error
            } catch(\Exception $ex) {
                print_r($ex);
                // When validation fails or other local issues
            }
        }
 
        if ( $this->session ) {
            $this->ci->session->set_userdata( 'fb_token', $this->session->getToken() );
            $this->session = new FacebookSession( $this->session->getToken() );
        }
    }
 
    public function get_login_url() {
        return $this->helper->getLoginUrl( $this->ci->config->item('permissions', 'facebook') );
    }
    public function get_logout_url() {
        if ( $this->session ) {
            return $this->helper->getLogoutUrl( $this->session, site_url() );
        }
        return false;
    }
 
    public function get_user() {
        if ( $this->session ) {
            try {
                $request = (new FacebookRequest( $this->session, 'GET', '/me' ))->execute();
                $user = $request->getGraphObject()->asArray();
                return $user;
 
            } catch(FacebookRequestException $e) {
                return false;
 
            }
        }
    }
    public function getProfilePictures() {
        if ( $this->session ) {
            error_reporting(0);
            try {
                $request = (new FacebookRequest( $this->session, 'GET', '/me/albums' ))->execute();
                $user = $request->getGraphObject()->asArray();
                foreach ($user as $key => $value) {
                    foreach ($value as $key => $value2) {
                        if(@$value2->type == "profile"){
                            $profilePictureAlbumId = $value2->id;
                        }
                    }
                }
                $request = (new FacebookRequest( $this->session, 'GET', '/'.$profilePictureAlbumId.'/photos' ))->execute();
                $photos = $request->getGraphObject()->asArray();
                foreach ($photos as $key => $photo) {
                    foreach ($photo as $key => $image) {
                        foreach ($image->images as $key => $value) {
                            if($value->width == 130 && $value->height == 130){
                                $pictures["thumbs"][] = $value->source;
                                $pictures["originals"][] = $image->images[0]->source;
                            }
                        }
                    }
                }
                return $pictures;
 
            } catch(FacebookRequestException $e) {
                return false;
 
            }
        }
    }
}
 
