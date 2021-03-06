﻿<!DOCTYPE html>
<html class="st-layout ls-top-navbar ls-bottom-footer show-sidebar sidebar-l2" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sevgi.li | <?php echo $user["name"]; ?></title>
    <link href="<?php echo base_url() ?>css/home.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="http://www.onderbilgisayarkursu.com/deneme/css/swipebox.min.css" />
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <!-- Wrapper required for sidebar transitions -->
    <div class="st-container">
    <?php 
    //print_r($this->session->userdata);
    ?>
        <!-- Fixed navbar -->
        <div class="navbar navbar-main navbar-primary navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="#sidebar-menu" data-effect="st-effect-1" data-toggle="sidebar-menu" class="toggle pull-left visible-xs"><i class="fa fa-ellipsis-v"></i></a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#sidebar-chat" data-toggle="sidebar-menu" data-effect="st-effect-1" class="toggle pull-right visible-xs"><i class="fa fa-comments"></i></a>
                    <a class="navbar-brand" href="index.html">Sevgi.li</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="main-nav">
                    <ul class="nav navbar-nav">
                        <li><a href="../../index.html">Themes</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li class="dropdown-header">Public User Pages</li>
                                <li class="active"><a href="index.html">Timeline</a>
                                </li>
                                <li><a href="user-public-profile.html">About</a>
                                </li>
                                <li><a href="user-public-users.html">Friends</a>
                                </li>
                                <li class="dropdown-header">Private User Pages</li>
                                <li><a href="user-private-messages.html">Messages</a>
                                </li>
                                <li><a href="user-private-profile.html">Profile</a>
                                </li>
                                <li><a href="user-private-timeline.html">Timeline</a>
                                </li>
                                <li><a href="user-private-users.html">Friends</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="buttons.html">UI Components</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden-xs">
                            <a href="#sidebar-chat" data-toggle="sidebar-menu" data-effect="st-effect-1">
                                <i class="fa fa-comments"></i>
                            </a>
                        </li>

                        <!-- User -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle user" data-toggle="dropdown">
                                <img src="https://graph.facebook.com/<?php echo $this->session->userdata("facebookId"); ?>/picture?width=30" alt="Bill" class="img-circle" width="40" /> <?php echo $this->session->userdata("first_name") ?> <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="user-private-profile.html">Profile</a>
                                </li>
                                <li><a href="user-private-messages.html">Messages</a>
                                </li>
                                <li><a href="<?php echo base_url()."index.php/logout"; ?>">Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <!-- /.navbar-collapse -->
                </div>
        </div>

        <!-- Sidebar component with st-effect-1 (set on the toggle button within the navbar) -->
        <div class="sidebar left sidebar-size-2 sidebar-offset-0 sidebar-visible-desktop sidebar-visible-mobile sidebar-skin-dark" id="sidebar-menu">
            <div data-scrollable>
                <div class="sidebar-block">
                    <div class="profile">
                        <img src="https://graph.facebook.com/<?php echo $this->session->userdata("facebookId"); ?>/picture?width=110" alt="people" class="img-circle" />
                        <h4><?php echo $this->session->userdata("name"); ?></h4>
                    </div>
                </div>
                <div class="category">About</div>
                <div class="sidebar-block">
                    <ul class="list-about">
                    <?php 
                    //print_r($user);
                    ?>
                        <li><i class="fa fa-map-marker"></i><?php echo $user["location"]->name ?></li>
                        <li><i class="fa fa-link"></i> <a href="#">www.mosaicpro.biz</a>
                        </li>
                        <li><i class="fa fa-twitter"></i> <a href="#">/mosaicprobiz</a></li>
                        <li><i class="fa fa-facebook"></i> <a href="<?php echo $user["link"] ?>"><?php echo $user["name"]; ?></a></li>
                    </ul>
                </div>
                <div class="category">Photos</div>
                <div class="sidebar-block">
                    <div class="sidebar-photos">
                        <ul>
                            <?php
                        if(!$pictures["noPhoto"]){    
                        foreach ($pictures["thumbs"] as $key => $picture) {
                            echo '<li>
                                <a class="swipebox" href="'.base_url().$pictures["originals"][$key].'">
                                    <img src="'.base_url().$picture.'" alt="people" width="48" height="48" />
                                </a>
                            </li>';
                        }
                    }else{
                        echo '<p>'.$pictures["noPhotoMessage"].'</p>';
                    }
                        ?>
                        </ul>
                        <a href="#" class="btn btn-primary btn-xs">view all</a>
                    </div>
                </div>
                <div class="category">Activity</div>
                <div class="sidebar-block">
                    <div class="sidebar-feed">
                        <ul>
                            <li class="media">
                                <span class="news-item-success pull-right"><i class="fa fa-circle"></i></span>
                                <span class="pull-left media-object">
                            <i class="fa fa-fw fa-bell"></i>
                        </span>
                                <div class="media-body">
                                    <a href="" class="text-white">Adrian</a> just logged in
                                    <span class="time">2 min ago</span>
                                </div>
                            </li>
                            <li class="media">
                                <span class="news-item-success pull-right"><i class="fa fa-circle"></i></span>
                                <span class="pull-left media-object">
                            <i class="fa fa-fw fa-bell"></i>
                        </span>
                                <div class="media-body">
                                    <a href="" class="text-white">Adrian</a> just added <a href="" class="text-white">mosaicpro</a> as their office
                                    <span class="time">2 min ago</span>
                                </div>
                            </li>
                            <li class="media">
                                <span class="pull-left media-object">
                            <i class="fa fa-fw fa-bell"></i>
                        </span>
                                <div class="media-body">
                                    <a href="" class="text-white">Adrian</a> just logged in
                                    <span class="time">2 min ago</span>
                                </div>
                            </li>
                            <li class="media">
                                <span class="pull-left media-object">
                            <i class="fa fa-fw fa-bell"></i>
                        </span>
                                <div class="media-body">
                                    <a href="" class="text-white">Adrian</a> just logged in
                                    <span class="time">2 min ago</span>
                                </div>
                            </li>
                            <li class="media">
                                <span class="pull-left media-object">
                            <i class="fa fa-fw fa-bell"></i>
                        </span>
                                <div class="media-body">
                                    <a href="" class="text-white">Adrian</a> just logged in
                                    <span class="time">2 min ago</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar component with st-effect-1 (set on the toggle button within the navbar) -->
        <div class="sidebar sidebar-chat right sidebar-size-2 sidebar-offset-0 chat-skin-white" id=sidebar-chat>
            <div class="split-vertical">
                <div class="chat-search">
                    <input type="text" class="form-control" placeholder="Search" />
                </div>
                <ul class="chat-filter nav nav-pills ">
                    <li class="active"><a href="#" data-target="li">All</a>
                    </li>
                    <li><a href="#" data-target=".online">Online</a>
                    </li>
                    <li><a href="#" data-target=".offline">Offline</a>
                    </li>
                </ul>
                <div class="split-vertical-body">
                    <div class="split-vertical-cell">
                        <div data-scrollable>
                            <ul class="chat-contacts">
                                <li class="online" data-user-id="1">
                                    <a href="#">
                                        <div class="media">
                                            <div class="pull-left">
                                                <span class="status"></span>
                                                <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/people/110/guy-6.jpg" width="40" class="img-circle" />
                                            </div>
                                            <div class="media-body">
                                                <div class="contact-name">Jonathan S.</div>
                                                <small>"Free Today"</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="online away" data-user-id="2">
                                    <a href="#">
                                        <div class="media">
                                            <div class="pull-left">
                                                <span class="status"></span>
                                                <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/people/110/woman-5.jpg" width="40" class="img-circle" />
                                            </div>
                                            <div class="media-body">
                                                <div class="contact-name">Mary A.</div>
                                                <small>"Feeling Groovy"</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="online" data-user-id="3">
                                    <a href="#">
                                        <div class="media">
                                            <div class="pull-left">
                                                <span class="status"></span>
                                                <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/people/110/guy-3.jpg" width="40" class="img-circle" />
                                            </div>
                                            <div class="media-body">
                                                <div class="contact-name">Adrian D.</div>
                                                <small>Busy</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="offline" data-user-id="4">
                                    <a href="#">
                                        <div class="media">
                                            <div class="pull-left">
                                                <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/people/110/woman-6.jpg" width="40" class="img-circle" />
                                            </div>
                                            <div class="media-body">
                                                <div class="contact-name">Michelle S.</div>
                                                <small>Offline</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="offline" data-user-id="5">
                                    <a href="#">
                                        <div class="media">
                                            <div class="pull-left">
                                                <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/people/110/woman-7.jpg" width="40" class="img-circle" />
                                            </div>
                                            <div class="media-body">
                                                <div class="contact-name">Daniele A.</div>
                                                <small>Offline</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="online" data-user-id="6">
                                    <a href="#">
                                        <div class="media">
                                            <div class="pull-left">
                                                <span class="status"></span>
                                                <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/people/110/guy-4.jpg" width="40" class="img-circle" />
                                            </div>
                                            <div class="media-body">
                                                <div class="contact-name">Jake F.</div>
                                                <small>Busy</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="online away" data-user-id="7">
                                    <a href="#">
                                        <div class="media">
                                            <div class="pull-left">
                                                <span class="status"></span>
                                                <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/people/110/woman-6.jpg" width="40" class="img-circle" />
                                            </div>
                                            <div class="media-body">
                                                <div class="contact-name">Jane A.</div>
                                                <small>"Custom Status"</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="offline" data-user-id="8">
                                    <a href="#">
                                        <div class="media">
                                            <div class="pull-left">
                                                <span class="status"></span>
                                                <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/people/110/woman-8.jpg" width="40" class="img-circle" />
                                            </div>
                                            <div class="media-body">
                                                <div class="contact-name">Sabine J.</div>
                                                <small>"Offline right now"</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="online away" data-user-id="9">
                                    <a href="#">
                                        <div class="media">
                                            <div class="pull-left">
                                                <span class="status"></span>
                                                <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/people/110/woman-9.jpg" width="40" class="img-circle" />
                                            </div>
                                            <div class="media-body">
                                                <div class="contact-name">Danny B.</div>
                                                <small>Be Right Back</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="online" data-user-id="10">
                                    <a href="#">
                                        <div class="media">
                                            <div class="pull-left">
                                                <span class="status"></span>
                                                <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/people/110/woman-8.jpg" width="40" class="img-circle" />
                                            </div>
                                            <div class="media-body">
                                                <div class="contact-name">Elise J.</div>
                                                <small>My Status</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="online" data-user-id="11">
                                    <a href="#">
                                        <div class="media">
                                            <div class="pull-left">
                                                <span class="status"></span>
                                                <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/people/110/guy-3.jpg" width="40" class="img-circle" />
                                            </div>
                                            <div class="media-body">
                                                <div class="contact-name">John J.</div>
                                                <small>My Status #1</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script id="chat-window-template" type="text/x-handlebars-template">
            <div class="panel panel-default">
                <div class="panel-heading" data-toggle="chat-collapse" data-target="#chat-bill">
                    <a href="#" class="close"><i class="fa fa-times"></i></a>
                    <a href="#">
                        <img src="{{ user_image }}" width="40" class="pull-left">
                        <span class="contact-name">{{user}}</span>
                    </a>
                </div>
                <div class="panel-body" id="chat-bill">
                    <div class="media">
                        <div class="pull-left">
                            <img src="{{ user_image }}" width="25" class="img-circle" alt="people" />
                        </div>
                        <div class="media-body">
                            <span class="message">Feeling Groovy?</span>
                        </div>
                    </div>
                    <div class="media right">
                        <div class="pull-right">
                            <img src="{{ user_image }}" width="25" class="img-circle" alt="people" />
                        </div>
                        <div class="media-body">
                            <span class="message">Yep.</span>
                        </div>
                    </div>
                    <div class="media">
                        <div class="pull-left">
                            <img src="{{ user_image }}" width="25" class="img-circle" alt="people" />
                        </div>
                        <div class="media-body">
                            <span class="message">This chat window looks amazing.</span>
                        </div>
                    </div>
                    <div class="media right">
                        <div class="pull-right">
                            <img src="{{ user_image }}" width="25" class="img-circle" alt="people" />
                        </div>
                        <div class="media-body">
                            <span class="message">Thanks!</span>
                        </div>
                    </div>
                </div>
                <input type="text" class="form-control" placeholder="Type message..." />
            </div>
        </script>
        <div class="chat-window-container"></div>

<div class="st-pusher" id="content">
<div class="st-content">

                <!-- extra div for emulating position:fixed of the menu -->
                <div class="st-content-inner">
                    <nav class="navbar navbar-subnav navbar-static-top margin-bottom-none" role="navigation">
                        <div class="container-fluid">

                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#subnav">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="fa fa-ellipsis-h"></span>
                                </button>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="subnav">
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="index.html"><i class="fa fa-fw icon-ship-wheel"></i> Timeline</a>
                                    </li>
                                    <li><a href="user-public-profile.html"><i class="fa fa-fw icon-user-1"></i> About</a>
                                    </li>
                                    <li><a href="user-public-users.html"><i class="fa fa-fw fa-users"></i> Friends</a>
                                    </li>
                                </ul>
                                <ul class="nav navbar-nav navbar-right hidden-xs">
                                    <li><a href="#" data-toggle="chat-box">Chat <i class="fa fa-fw fa-comment-o"></i></a>
                                    </li>
                                </ul>
                            </div>

                            <!-- /.navbar-collapse -->
                            </div>
                    </nav>
                    <div class="container-fluid">
                        <div class="cover overlay hover cover-image-full height-300">
                            <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/profile-cover.jpg" alt="cover" />
                            <div class="overlay overlay-full overlay-bg-black">
                                <div class="v-top">
                                    <a href="#" class="btn btn-cover"><i class="fa fa-pencil"></i></a>
                                </div>
                            </div>
                            <div class="overlay overlay-full overlay-hover overlay-bg-black">
                                <div class="v-center">
                                    <a class="btn btn-circle btn-lg btn-white" href=""><i class="fa fa-plus"></i></a>
                                    <br/>
                                    <a href="" class="text-h3">Update cover</a>
                                </div>
                            </div>
                        </div>
                        <div class="timeline row" data-toggle="gridalicious">
                            <div class="timeline-block">
                                <div class="panel panel-default share">
                                    <div class="panel-heading panel-heading-gray title">
                                        What&acute;s new
                                    </div>
                                    <div class="panel-body">
                                        <textarea name="status" class="form-control share-text" rows="3" placeholder="Share your status..."></textarea>
                                    </div>
                                    <div class="panel-footer share-buttons">
                                        <a href="#"><i class="fa fa-map-marker"></i></a>
                                        <a href="#"><i class="fa fa-photo"></i></a>
                                        <a href="#"><i class="fa fa-video-camera"></i></a>
                                        <button type="submit" class="btn btn-primary btn-xs pull-right display-none" href="#">Post</button>
                                    </div>
                                </div>
                            </div>
                            <div class="timeline-block">
                                <div class="panel panel-default relative">
                                    <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/place2-full.jpg" alt="place" class="img-responsive">
                                    <div class="panel-body panel-boxed text-center">
                                        <div class="rating">
                                            <span class="star"></span>
                                            <span class="star filled"></span>
                                            <span class="star filled"></span>
                                            <span class="star filled"></span>
                                            <span class="star filled"></span>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/people/50/guy-2.jpg" alt="people" class="img-circle" />
                                        <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/people/50/woman-2.jpg" alt="people" class="img-circle" />
                                        <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/people/50/guy-3.jpg" alt="people" class="img-circle" />
                                        <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/people/50/woman-3.jpg" alt="people" class="img-circle" />
                                        <a href="#" class="user-count-circle">12+</a>
                                    </div>
                                </div>
                            </div>
                            <div class="timeline-block">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="media">
                                            <a href="" class="pull-left">
                                                <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/people/50/woman-5.jpg" class="media-object">
                                            </a>
                                            <div class="media-body">
                                                <a href="#" class="pull-right text-muted"><i class="icon-reply-all-fill fa fa-2x "></i></a>
                                                <a href="">Mary</a>
                                                <span>on 15th January, 2014</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <p>Late Night Show Photos</p>
                                        <div class="timeline-added-images">
                                            <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/social/100/1.jpg" width="80" alt="photo" />
                                            <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/social/100/2.jpg" width="80" alt="photo" />
                                            <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/social/100/3.jpg" width="80" alt="photo" />
                                        </div>
                                    </div>
                                    <div class="view-all-comments"><a href="#"><i class="fa fa-comments-o"></i> View all</a> 10 comments</div>
                                    <ul class="comments">
                                        <li>
                                            <div class="media">
                                                <a href="" class="pull-left">
                                                    <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/people/50/guy-5.jpg" class="media-object">
                                                </a>
                                                <div class="pull-right dropdown" data-show-hover="li">
                                                    <a href="#" data-toggle="dropdown" class="toggle-button">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="#">Edit</a>
                                                        </li>
                                                        <li><a href="#">Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="media-body">
                                                    <a href="" class="comment-author">Bill D.</a>
                                                    <span>Hi Mary, Nice Party</span>
                                                    <div class="comment-date">21st September</div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <a href="" class="pull-left">
                                                    <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/people/50/woman-5.jpg" class="media-object">
                                                </a>
                                                <div class="pull-right dropdown" data-show-hover="li">
                                                    <a href="#" data-toggle="dropdown" class="toggle-button">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="#">Edit</a>
                                                        </li>
                                                        <li><a href="#">Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="media-body">
                                                    <a href="" class="comment-author">Mary</a>
                                                    <span>Thanks Bill</span>
                                                    <div class="comment-date">2 days</div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <a href="" class="pull-left">
                                                    <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/people/50/guy-5.jpg" class="media-object">
                                                </a>
                                                <div class="pull-right dropdown" data-show-hover="li">
                                                    <a href="#" data-toggle="dropdown" class="toggle-button">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="#">Edit</a>
                                                        </li>
                                                        <li><a href="#">Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="media-body">
                                                    <a href="" class="comment-author">Bill D.</a>
                                                    <span>What time did it finish?</span>
                                                    <div class="comment-date">14 min</div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="comment-form">
                                            <div class="input-group">
                                                <input type="text" class="form-control" />
                                                <span class="input-group-btn">
                   <a href="" class="btn btn-default"><i class="fa fa-photo"></i></a>
                </span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="timeline-block">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="media">
                                            <a href="" class="pull-left">
                                                <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/people/50/guy-5.jpg" class="media-object">
                                            </a>
                                            <div class="media-body">
                                                <a href="#" class="pull-right text-muted"><i class="icon-reply-all-fill fa fa-2x "></i></a>
                                                <a href="">Bill</a>
                                                <span>on 15th January, 2014</span>
                                            </div>
                                        </div>
                                    </div>
                                    <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/place1-full.jpg" class="img-responsive">
                                    <ul class="comments">
                                        <li>
                                            <div class="media">
                                                <a href="" class="pull-left">
                                                    <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/people/50/woman-5.jpg" class="media-object">
                                                </a>
                                                <div class="pull-right dropdown" data-show-hover="li">
                                                    <a href="#" data-toggle="dropdown" class="toggle-button">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="#">Edit</a>
                                                        </li>
                                                        <li><a href="#">Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="media-body">
                                                    <a href="" class="comment-author">Mary</a>
                                                    <span>Wow</span>
                                                    <div class="comment-date">2 days</div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="comment-form">
                                            <div class="input-group">
                                                <input type="text" class="form-control" />
                                                <span class="input-group-btn">
                   <a href="" class="btn btn-default"><i class="fa fa-photo"></i></a>
                </span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="timeline-block">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="media">
                                            <a href="" class="pull-left">
                                                <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/people/50/woman-5.jpg" class="media-object">
                                            </a>
                                            <div class="media-body">
                                                <a href="#" class="pull-right text-muted"><i class="icon-reply-all-fill fa fa-2x "></i></a>
                                                <a href="">Mary</a>
                                                <span>on 15th January, 2014</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body text-muted">
                                        <i class="fa fa-map-marker"></i> Was in <a href="#">Brooklyn, New York</a>
                                    </div>
                                    <img src="http://maps.googleapis.com/maps/api/staticmap?center=Brooklyn+Bridge,New+York,NY&zoom=13&size=370x300&scale=2&maptype=roadmap
&markers=color:blue%7Clabel:S%7C40.702147,-74.015794&markers=color:green%7Clabel:G%7C40.711614,-74.012318
&markers=color:red%7Clabel:C%7C40.718217,-73.998284" class="img-responsive">
                                    <div class="view-all-comments"><i class="fa fa-comments-o"></i> Be the first to comment</div>
                                    <ul class="comments">
                                        <li class="comment-form">
                                            <div class="input-group">
                                                <input type="text" class="form-control" />
                                                <span class="input-group-btn">
                   <a href="" class="btn btn-default"><i class="fa fa-photo"></i></a>
                </span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="timeline-block">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="media">
                                            <a href="" class="pull-left">
                                                <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/people/50/guy-5.jpg" class="media-object">
                                            </a>
                                            <div class="media-body">
                                                <a href="#" class="pull-right text-muted"><i class="icon-reply-all-fill fa fa-2x "></i></a>
                                                <a href="">Bill</a>
                                                <span>on 15th January, 2014</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        Amazing 3D Animation
                                    </div>
                                    <div class="videoWrapper">
                                        <iframe src="//player.vimeo.com/video/50522981?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="500" height="271" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                    </div>
                                    <div class="view-all-comments"><i class="fa fa-comments-o"></i> Be the first to comment</div>
                                    <ul class="comments">
                                        <li class="comment-form">
                                            <div class="input-group">
                                                <input type="text" class="form-control" />
                                                <span class="input-group-btn">
                   <a href="" class="btn btn-default"><i class="fa fa-photo"></i></a>
                </span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="timeline-block">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="media">
                                            <a href="" class="pull-left">
                                                <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/people/50/woman-4.jpg" class="media-object">
                                            </a>
                                            <div class="media-body">
                                                <a href="#" class="pull-right text-muted"><i class="icon-reply-all-fill fa fa-2x "></i></a>
                                                <a href="">Michelle</a>
                                                <span>on 15th January, 2014</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="weather-svg">
                                        <div class="list">
                                            <div class="row">
                                                <div class="col-xs-4 text-center">
                                                    <div>Today</div>
                                                    <svg version="1.1" id="cloudDrizzleSunFill" class="climacon climacon_cloudDrizzleSunFill" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="15 15 70 70" enable-background="new 15 15 70 70" xml:space="preserve">
                                                        <g class="climacon_iconWrap climacon_iconWrap-cloudDrizzleSunFill">
                                                            <g class="climacon_componentWrap climacon_componentWrap-sun climacon_componentWrap-sun_cloud">
                                                                <g class="climacon_componentWrap climacon_componentWrap_sunSpoke">
                                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M80.029,43.611h-3.998c-1.105,0-2-0.896-2-1.999s0.895-2,2-2h3.998c1.104,0,2,0.896,2,2S81.135,43.611,80.029,43.611z" />
                                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M72.174,30.3c-0.781,0.781-2.049,0.781-2.828,0c-0.781-0.781-0.781-2.047,0-2.828l2.828-2.828c0.779-0.781,2.047-0.781,2.828,0c0.779,0.781,0.779,2.047,0,2.828L72.174,30.3z" />
                                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M58.033,25.614c-1.105,0-2-0.896-2-2v-3.999c0-1.104,0.895-2,2-2c1.104,0,2,0.896,2,2v3.999C60.033,24.718,59.135,25.614,58.033,25.614z" />
                                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M43.892,30.3l-2.827-2.828c-0.781-0.781-0.781-2.047,0-2.828c0.78-0.781,2.047-0.781,2.827,0l2.827,2.828c0.781,0.781,0.781,2.047,0,2.828C45.939,31.081,44.673,31.081,43.892,30.3z" />
                                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M42.033,41.612c0,1.104-0.896,1.999-2,1.999h-4c-1.104,0-1.998-0.896-1.998-1.999s0.896-2,1.998-2h4C41.139,39.612,42.033,40.509,42.033,41.612z" />
                                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M43.892,52.925c0.781-0.78,2.048-0.78,2.827,0c0.781,0.78,0.781,2.047,0,2.828l-2.827,2.827c-0.78,0.781-2.047,0.781-2.827,0c-0.781-0.78-0.781-2.047,0-2.827L43.892,52.925z" />
                                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M58.033,57.61c1.104,0,2,0.895,2,1.999v4c0,1.104-0.896,2-2,2c-1.105,0-2-0.896-2-2v-4C56.033,58.505,56.928,57.61,58.033,57.61z" />
                                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M72.174,52.925l2.828,2.828c0.779,0.78,0.779,2.047,0,2.827c-0.781,0.781-2.049,0.781-2.828,0l-2.828-2.827c-0.781-0.781-0.781-2.048,0-2.828C70.125,52.144,71.391,52.144,72.174,52.925z" />
                                                                </g>
                                                                <g class="climacon_componentWrap climacon_componentWrap-sunBody">
                                                                    <circle class="climacon_component climacon_component-stroke climacon_component-stroke_sunBody" cx="58.033" cy="41.612" r="11.999" />
                                                                    <circle class="climacon_component climacon_component-fill climacon_component-fill_sunBody" fill="#FFFFFF" cx="58.033" cy="41.612" r="7.999" />
                                                                </g>
                                                            </g>
                                                            <g class="climacon_componentWrap climacon_componentWrap-drizzle">
                                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_drizzle climacon_component-stroke_drizzle-left" d="M42.001,53.644c1.104,0,2,0.896,2,2v3.998c0,1.105-0.896,2-2,2c-1.105,0-2.001-0.895-2.001-2v-3.998C40,54.538,40.896,53.644,42.001,53.644z" />
                                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_drizzle climacon_component-stroke_drizzle-middle" d="M49.999,53.644c1.104,0,2,0.896,2,2v4c0,1.104-0.896,2-2,2s-1.998-0.896-1.998-2v-4C48.001,54.54,48.896,53.644,49.999,53.644z" />
                                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_drizzle climacon_component-stroke_drizzle-right" d="M57.999,53.644c1.104,0,2,0.896,2,2v3.998c0,1.105-0.896,2-2,2c-1.105,0-2-0.895-2-2v-3.998C55.999,54.538,56.894,53.644,57.999,53.644z" />
                                                            </g>
                                                            <g class="climacon_componentWrap climacon_componentWrap_cloud">
                                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_cloud" d="M43.945,65.639c-8.835,0-15.998-7.162-15.998-15.998c0-8.836,7.163-15.998,15.998-15.998c6.004,0,11.229,3.312,13.965,8.203c0.664-0.113,1.338-0.205,2.033-0.205c6.627,0,11.998,5.373,11.998,12c0,6.625-5.371,11.998-11.998,11.998C57.168,65.639,47.143,65.639,43.945,65.639z" />
                                                                <path class="climacon_component climacon_component-fill climacon_component-fill_cloud" fill="#FFFFFF" d="M59.943,61.639c4.418,0,8-3.582,8-7.998c0-4.417-3.582-8-8-8c-1.601,0-3.082,0.481-4.334,1.291c-1.23-5.316-5.973-9.29-11.665-9.29c-6.626,0-11.998,5.372-11.998,11.999c0,6.626,5.372,11.998,11.998,11.998C47.562,61.639,56.924,61.639,59.943,61.639z" />
                                                            </g>
                                                        </g>
                                                    </svg>

                                                    <!-- cloudDrizzleSunFill -->
                                                    </div>
                                                <div class="col-xs-4 text-center">
                                                    <div>Tomorrow</div>
                                                    <svg version="1.1" id="sun" class="climacon climacon_sun" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="15 15 70 70" enable-background="new 15 15 70 70" xml:space="preserve">
                                                        <clipPath id="svgs/sunFillClip">
                                                            <path d="M0,0v100h100V0H0z M50.001,57.999c-4.417,0-8-3.582-8-7.999c0-4.418,3.582-7.999,8-7.999s7.998,3.581,7.998,7.999C57.999,54.417,54.418,57.999,50.001,57.999z" />
                                                        </clipPath>
                                                        <g class="climacon_iconWrap climacon_iconWrap-sun">
                                                            <g class="climacon_componentWrap climacon_componentWrap-sun">
                                                                <g class="climacon_componentWrap climacon_componentWrap-sunSpoke">
                                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-east" d="M72.03,51.999h-3.998c-1.105,0-2-0.896-2-1.999s0.895-2,2-2h3.998c1.104,0,2,0.896,2,2S73.136,51.999,72.03,51.999z" />
                                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-northEast" d="M64.175,38.688c-0.781,0.781-2.049,0.781-2.828,0c-0.781-0.781-0.781-2.047,0-2.828l2.828-2.828c0.779-0.781,2.047-0.781,2.828,0c0.779,0.781,0.779,2.047,0,2.828L64.175,38.688z" />
                                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M50.034,34.002c-1.105,0-2-0.896-2-2v-3.999c0-1.104,0.895-2,2-2c1.104,0,2,0.896,2,2v3.999C52.034,33.106,51.136,34.002,50.034,34.002z" />
                                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-northWest" d="M35.893,38.688l-2.827-2.828c-0.781-0.781-0.781-2.047,0-2.828c0.78-0.781,2.047-0.781,2.827,0l2.827,2.828c0.781,0.781,0.781,2.047,0,2.828C37.94,39.469,36.674,39.469,35.893,38.688z" />
                                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-west" d="M34.034,50c0,1.104-0.896,1.999-2,1.999h-4c-1.104,0-1.998-0.896-1.998-1.999s0.896-2,1.998-2h4C33.14,48,34.034,48.896,34.034,50z" />
                                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-southWest" d="M35.893,61.312c0.781-0.78,2.048-0.78,2.827,0c0.781,0.78,0.781,2.047,0,2.828l-2.827,2.827c-0.78,0.781-2.047,0.781-2.827,0c-0.781-0.78-0.781-2.047,0-2.827L35.893,61.312z" />
                                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-south" d="M50.034,65.998c1.104,0,2,0.895,2,1.999v4c0,1.104-0.896,2-2,2c-1.105,0-2-0.896-2-2v-4C48.034,66.893,48.929,65.998,50.034,65.998z" />
                                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-southEast" d="M64.175,61.312l2.828,2.828c0.779,0.78,0.779,2.047,0,2.827c-0.781,0.781-2.049,0.781-2.828,0l-2.828-2.827c-0.781-0.781-0.781-2.048,0-2.828C62.126,60.531,63.392,60.531,64.175,61.312z" />
                                                                </g>
                                                                <g class="climacon_componentWrap climacon_componentWrap_sunBody" clip-path="url(#sunFillClip)">
                                                                    <circle class="climacon_component climacon_component-stroke climacon_component-stroke_sunBody" cx="50.034" cy="50" r="11.999" />
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </svg>

                                                    <!-- sun -->
                                                    </div>
                                                <div class="col-xs-4 text-center">
                                                    <div>Saturday</div>
                                                    <svg version="1.1" id="cloudRainFill" class="climacon climacon_cloudRainFill" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="15 15 70 70" enable-background="new 15 15 70 70" xml:space="preserve">
                                                        <g class="climacon_iconWrap climacon_iconWrap-cloudRainFill">
                                                            <g class="climacon_componentWrap climacon_componentWrap-rain">
                                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_rain climacon_component-stroke_rain- left" d="M41.946,53.641c1.104,0,1.999,0.896,1.999,2v15.998c0,1.105-0.895,2-1.999,2s-2-0.895-2-2V55.641C39.946,54.537,40.842,53.641,41.946,53.641z" />
                                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_rain climacon_component-stroke_rain- middle" d="M49.945,57.641c1.104,0,2,0.896,2,2v15.998c0,1.104-0.896,2-2,2s-2-0.896-2-2V59.641C47.945,58.535,48.841,57.641,49.945,57.641z" />
                                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_rain climacon_component-stroke_rain- right" d="M57.943,53.641c1.104,0,2,0.896,2,2v15.998c0,1.105-0.896,2-2,2c-1.104,0-2-0.895-2-2V55.641C55.943,54.537,56.84,53.641,57.943,53.641z" />
                                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_rain climacon_component-stroke_rain- left" d="M41.946,53.641c1.104,0,1.999,0.896,1.999,2v15.998c0,1.105-0.895,2-1.999,2s-2-0.895-2-2V55.641C39.946,54.537,40.842,53.641,41.946,53.641z" />
                                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_rain climacon_component-stroke_rain- middle" d="M49.945,57.641c1.104,0,2,0.896,2,2v15.998c0,1.104-0.896,2-2,2s-2-0.896-2-2V59.641C47.945,58.535,48.841,57.641,49.945,57.641z" />
                                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_rain climacon_component-stroke_rain- right" d="M57.943,53.641c1.104,0,2,0.896,2,2v15.998c0,1.105-0.896,2-2,2c-1.104,0-2-0.895-2-2V55.641C55.943,54.537,56.84,53.641,57.943,53.641z" />
                                                            </g>
                                                            <g class="climacon_componentWrap climacon_componentWrap_cloud">
                                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_cloud" d="M43.945,65.639c-8.835,0-15.998-7.162-15.998-15.998c0-8.836,7.163-15.998,15.998-15.998c6.004,0,11.229,3.312,13.965,8.203c0.664-0.113,1.338-0.205,2.033-0.205c6.627,0,11.998,5.373,11.998,12c0,6.625-5.371,11.998-11.998,11.998C57.168,65.639,47.143,65.639,43.945,65.639z" />
                                                                <path class="climacon_component climacon_component-fill climacon_component-fill_cloud" fill="#FFFFFF" d="M59.943,61.639c4.418,0,8-3.582,8-7.998c0-4.417-3.582-8-8-8c-1.601,0-3.082,0.481-4.334,1.291c-1.23-5.316-5.973-9.29-11.665-9.29c-6.626,0-11.998,5.372-11.998,11.999c0,6.626,5.372,11.998,11.998,11.998C47.562,61.639,56.924,61.639,59.943,61.639z" />
                                                            </g>
                                                        </g>
                                                    </svg>

                                                    <!-- cloudRainFill -->
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="today text-center">
                                            <svg version="1.1" id="cloudDrizzleSunFill" class="climacon climacon_cloudDrizzleSunFill" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="15 15 70 70" enable-background="new 15 15 70 70" xml:space="preserve">
                                                <g class="climacon_iconWrap climacon_iconWrap-cloudDrizzleSunFill">
                                                    <g class="climacon_componentWrap climacon_componentWrap-sun climacon_componentWrap-sun_cloud">
                                                        <g class="climacon_componentWrap climacon_componentWrap_sunSpoke">
                                                            <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M80.029,43.611h-3.998c-1.105,0-2-0.896-2-1.999s0.895-2,2-2h3.998c1.104,0,2,0.896,2,2S81.135,43.611,80.029,43.611z" />
                                                            <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M72.174,30.3c-0.781,0.781-2.049,0.781-2.828,0c-0.781-0.781-0.781-2.047,0-2.828l2.828-2.828c0.779-0.781,2.047-0.781,2.828,0c0.779,0.781,0.779,2.047,0,2.828L72.174,30.3z" />
                                                            <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M58.033,25.614c-1.105,0-2-0.896-2-2v-3.999c0-1.104,0.895-2,2-2c1.104,0,2,0.896,2,2v3.999C60.033,24.718,59.135,25.614,58.033,25.614z" />
                                                            <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M43.892,30.3l-2.827-2.828c-0.781-0.781-0.781-2.047,0-2.828c0.78-0.781,2.047-0.781,2.827,0l2.827,2.828c0.781,0.781,0.781,2.047,0,2.828C45.939,31.081,44.673,31.081,43.892,30.3z" />
                                                            <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M42.033,41.612c0,1.104-0.896,1.999-2,1.999h-4c-1.104,0-1.998-0.896-1.998-1.999s0.896-2,1.998-2h4C41.139,39.612,42.033,40.509,42.033,41.612z" />
                                                            <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M43.892,52.925c0.781-0.78,2.048-0.78,2.827,0c0.781,0.78,0.781,2.047,0,2.828l-2.827,2.827c-0.78,0.781-2.047,0.781-2.827,0c-0.781-0.78-0.781-2.047,0-2.827L43.892,52.925z" />
                                                            <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M58.033,57.61c1.104,0,2,0.895,2,1.999v4c0,1.104-0.896,2-2,2c-1.105,0-2-0.896-2-2v-4C56.033,58.505,56.928,57.61,58.033,57.61z" />
                                                            <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M72.174,52.925l2.828,2.828c0.779,0.78,0.779,2.047,0,2.827c-0.781,0.781-2.049,0.781-2.828,0l-2.828-2.827c-0.781-0.781-0.781-2.048,0-2.828C70.125,52.144,71.391,52.144,72.174,52.925z" />
                                                        </g>
                                                        <g class="climacon_componentWrap climacon_componentWrap-sunBody">
                                                            <circle class="climacon_component climacon_component-stroke climacon_component-stroke_sunBody" cx="58.033" cy="41.612" r="11.999" />
                                                            <circle class="climacon_component climacon_component-fill climacon_component-fill_sunBody" fill="#FFFFFF" cx="58.033" cy="41.612" r="7.999" />
                                                        </g>
                                                    </g>
                                                    <g class="climacon_componentWrap climacon_componentWrap-drizzle">
                                                        <path class="climacon_component climacon_component-stroke climacon_component-stroke_drizzle climacon_component-stroke_drizzle-left" d="M42.001,53.644c1.104,0,2,0.896,2,2v3.998c0,1.105-0.896,2-2,2c-1.105,0-2.001-0.895-2.001-2v-3.998C40,54.538,40.896,53.644,42.001,53.644z" />
                                                        <path class="climacon_component climacon_component-stroke climacon_component-stroke_drizzle climacon_component-stroke_drizzle-middle" d="M49.999,53.644c1.104,0,2,0.896,2,2v4c0,1.104-0.896,2-2,2s-1.998-0.896-1.998-2v-4C48.001,54.54,48.896,53.644,49.999,53.644z" />
                                                        <path class="climacon_component climacon_component-stroke climacon_component-stroke_drizzle climacon_component-stroke_drizzle-right" d="M57.999,53.644c1.104,0,2,0.896,2,2v3.998c0,1.105-0.896,2-2,2c-1.105,0-2-0.895-2-2v-3.998C55.999,54.538,56.894,53.644,57.999,53.644z" />
                                                    </g>
                                                    <g class="climacon_componentWrap climacon_componentWrap_cloud">
                                                        <path class="climacon_component climacon_component-stroke climacon_component-stroke_cloud" d="M43.945,65.639c-8.835,0-15.998-7.162-15.998-15.998c0-8.836,7.163-15.998,15.998-15.998c6.004,0,11.229,3.312,13.965,8.203c0.664-0.113,1.338-0.205,2.033-0.205c6.627,0,11.998,5.373,11.998,12c0,6.625-5.371,11.998-11.998,11.998C57.168,65.639,47.143,65.639,43.945,65.639z" />
                                                        <path class="climacon_component climacon_component-fill climacon_component-fill_cloud" fill="#FFFFFF" d="M59.943,61.639c4.418,0,8-3.582,8-7.998c0-4.417-3.582-8-8-8c-1.601,0-3.082,0.481-4.334,1.291c-1.23-5.316-5.973-9.29-11.665-9.29c-6.626,0-11.998,5.372-11.998,11.999c0,6.626,5.372,11.998,11.998,11.998C47.562,61.639,56.924,61.639,59.943,61.639z" />
                                                    </g>
                                                </g>
                                            </svg>

                                            <!-- cloudDrizzleSunFill -->
                                            <div class="clearfix"></div>
                                            <div class="details">Today:
                                                <strong>10&deg; C</strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="view-all-comments"><i class="fa fa-comments-o"></i> Be the first to comment</div>
                                    <ul class="comments">
                                        <li class="comment-form">
                                            <div class="input-group">
                                                <input type="text" class="form-control" />
                                                <span class="input-group-btn">
                   <a href="" class="btn btn-default"><i class="fa fa-photo"></i></a>
                </span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="timeline-block">
                                <div class="panel panel-default profile">
                                    <div class="cover-container">
                                        <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/place1-full.jpg" alt="place" class="img-responsive" />
                                    </div>
                                    <div class="info">
                                        <h4>Adrian Demian</h4>
                                        <p>User Interface Designer</p>
                                    </div>
                                    <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/people/110/guy-6.jpg" alt="people" class="img-circle avatar" />
                                    <div class="profile-icons">
                                        <span><i class="fa fa-users"></i> 372</span> <span><i class="fa fa-photo"></i> 43</span> <span><i class="fa fa-video-camera"></i> 3 </span>
                                    </div>
                                    <a href="#" class="btn btn-brand-primary pull-right"><i class="fa fa-comment"></i></a>
                                </div>
                            </div>
                            <div class="timeline-block">
                                <div class="panel panel-default event">
                                    <div class="panel-heading title">
                                        Cocktail Party
                                    </div>
                                    <ul class="list-group">
                                        <li class="list-group-item"><i class="fa fa-globe"></i> Miami, FL</li>
                                        <li class="list-group-item"><i class="fa fa-calendar-o"></i> 31st Oct 2014</li>
                                        <li class="list-group-item"><i class="fa fa-clock-o"></i> 5:50 PM</li>
                                        <li class="list-group-item"><i class="fa fa-users"></i> 9 Attendees <a href="#" class="btn btn-primary btn-xs pull-right">Attend</a>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled attendees">
                                        <li>
                                            <a href="#">
                                                <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/people/110/guy-6.jpg" alt="people" class="img-responsive" />
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/people/110/woman-3.jpg" alt="people" class="img-responsive" />
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/people/110/guy-2.jpg" alt="people" class="img-responsive" />
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/people/110/guy-9.jpg" alt="people" class="img-responsive" />
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/people/110/woman-9.jpg" alt="people" class="img-responsive" />
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/people/110/guy-4.jpg" alt="people" class="img-responsive" />
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/people/110/guy-1.jpg" alt="people" class="img-responsive" />
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/people/110/woman-4.jpg" alt="people" class="img-responsive" />
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/people/110/guy-6.jpg" alt="people" class="img-responsive" />
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="timeline-block">
                                <div class="panel panel-default profile-card">
                                    <div class="panel-body">
                                        <div class="profile-card-icon">
                                            <i class="fa fa-graduation-cap"></i>
                                        </div>
                                        <h4 class="text-center">Graduation Badge</h4>
                                        <ul class="profile-card-items">
                                            <li><i class="fa fa-map-marker"></i> Amsterdam, Europe</li>
                                            <li><i class="fa fa-trophy"></i> 1st in Class</li>
                                            <li><i class="fa fa-calendar"></i> 31st Oct 2014</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="timeline-block">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="media">
                                            <a href="" class="pull-left">
                                                <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/people/50/guy-2.jpg" class="media-object">
                                            </a>
                                            <div class="media-body">
                                                <a href="#" class="pull-right text-muted"><i class="icon-reply-all-fill fa fa-2x "></i></a>
                                                <a href="">Jonathan</a>
                                                <span>on 15th January, 2014</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad blanditiis perspiciatis praesentium quaerat repudiandae soluta? Cum doloribus esse et eum facilis impedit officiis omnis optio, placeat, quia quo reprehenderit sunt velit? Asperiores cumque deserunt eveniet hic reprehenderit sit, ut voluptatum?</p>
                                    </div>
                                    <div class="view-all-comments"><a href="#"><i class="fa fa-comments-o"></i> View all</a> 10 comments</div>
                                    <ul class="comments">
                                        <li>
                                            <div class="media">
                                                <a href="" class="pull-left">
                                                    <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/people/50/woman-5.jpg" class="media-object">
                                                </a>
                                                <div class="pull-right dropdown" data-show-hover="li">
                                                    <a href="#" data-toggle="dropdown" class="toggle-button">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="#">Edit</a>
                                                        </li>
                                                        <li><a href="#">Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="media-body">
                                                    <a href="" class="comment-author">Mary</a>
                                                    <span>Thanks Bill</span>
                                                    <div class="comment-date">2 days</div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <a href="" class="pull-left">
                                                    <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/people/50/guy-5.jpg" class="media-object">
                                                </a>
                                                <div class="pull-right dropdown" data-show-hover="li">
                                                    <a href="#" data-toggle="dropdown" class="toggle-button">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="#">Edit</a>
                                                        </li>
                                                        <li><a href="#">Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="media-body">
                                                    <a href="" class="comment-author">Bill D.</a>
                                                    <span>What time did it finish?</span>
                                                    <div class="comment-date">14 min</div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="comment-form">
                                            <div class="input-group">
                                                <input type="text" class="form-control" />
                                                <span class="input-group-btn">
                   <a href="" class="btn btn-default"><i class="fa fa-photo"></i></a>
                </span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="timeline-block">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="media">
                                            <a href="" class="pull-left">
                                                <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/people/50/guy-2.jpg" class="media-object">
                                            </a>
                                            <div class="media-body">
                                                <a href="#" class="pull-right text-muted"><i class="icon-reply-all-fill fa fa-2x "></i></a>
                                                <a href="">Jonathan</a>
                                                <span>on 15th January, 2014</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="boxed">
                                            <a href="#" class="h4 margin-none">Vegetarian Pizza</a>
                                            <div class="rating text-left">
                                                <span class="star"></span>
                                                <span class="star filled"></span>
                                                <span class="star filled"></span>
                                                <span class="star filled"></span>
                                                <span class="star filled"></span>
                                            </div>
                                            <div class="media">
                                                <a href="#" class="media-object pull-left">
                                                    <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/food1.jpg" alt="" width="80" />
                                                </a>
                                                <div class="media-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor impedit ipsum laborum maiores tempore veritatis....</p>
                                                </div>
                                            </div>
                                            <ul class="icon-list">
                                                <li><i class="fa fa-star fa-fw"></i> 4.8</li>
                                                <li><i class="fa fa-clock-o fa-fw"></i> 20 min</li>
                                                <li><i class="fa fa-graduation-cap fa-fw"></i> Beginner</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="view-all-comments"><a href="#"><i class="fa fa-comments-o"></i> View all</a> 10 comments</div>
                                    <ul class="comments">
                                        <li>
                                            <div class="media">
                                                <a href="" class="pull-left">
                                                    <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/people/50/guy-5.jpg" class="media-object">
                                                </a>
                                                <div class="pull-right dropdown" data-show-hover="li">
                                                    <a href="#" data-toggle="dropdown" class="toggle-button">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="#">Edit</a>
                                                        </li>
                                                        <li><a href="#">Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="media-body">
                                                    <a href="" class="comment-author">Bill D.</a>
                                                    <span>Hi Mary, Nice Party</span>
                                                    <div class="comment-date">21st September</div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <a href="" class="pull-left">
                                                    <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/people/50/woman-5.jpg" class="media-object">
                                                </a>
                                                <div class="pull-right dropdown" data-show-hover="li">
                                                    <a href="#" data-toggle="dropdown" class="toggle-button">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="#">Edit</a>
                                                        </li>
                                                        <li><a href="#">Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="media-body">
                                                    <a href="" class="comment-author">Mary</a>
                                                    <span>Thanks Bill</span>
                                                    <div class="comment-date">2 days</div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <a href="" class="pull-left">
                                                    <img src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/images/people/50/guy-5.jpg" class="media-object">
                                                </a>
                                                <div class="pull-right dropdown" data-show-hover="li">
                                                    <a href="#" data-toggle="dropdown" class="toggle-button">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="#">Edit</a>
                                                        </li>
                                                        <li><a href="#">Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="media-body">
                                                    <a href="" class="comment-author">Bill D.</a>
                                                    <span>What time did it finish?</span>
                                                    <div class="comment-date">14 min</div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="comment-form">
                                            <div class="input-group">
                                                <input type="text" class="form-control" />
                                                <span class="input-group-btn">
                   <a href="" class="btn btn-default"><i class="fa fa-photo"></i></a>
                </span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /st-content-inner -->
                </div>

            <!-- /st-content -->
            </div>

        <!-- /st-pusher -->
        
<!-- Footer --><div class="footer">
            ThemeKit - Modern UI Kits for Apps &amp; Websites &copy; Copyright Notice
        </div>

        <!-- // Footer -->
        </div>

    <!-- /st-container -->
    
<!-- Inline Script for colors and config objects; used by various external scripts; --><script>
    var colors = {
        "danger-color": "#e74c3c",
        "success-color": "#81b53e",
        "warning-color": "#f0ad4e",
        "inverse-color": "#2c3e50",
        "info-color": "#2d7cb5",
        "default-color": "#6e7882",
        "default-light-color": "#cfd9db",
        "purple-color": "#9D8AC7",
        "mustard-color": "#d4d171",
        "lightred-color": "#e15258",
        "body-bg": "#f6f6f6"
    };
    var config = {
        debug: true,
        theme: "social-2",
        skins: {
            "default": {
                "primary-color": "#16ae9f"
            },
            "orange": {
                "primary-color": "#e74c3c"
            },
            "blue": {
                "primary-color": "#4687ce"
            },
            "purple": {
                "primary-color": "#af86b9"
            },
            "brown": {
                "primary-color": "#c3a961"
            },
            "default-nav-inverse": {
                "color-block": "#242424"
            }
        }
    };
    </script>
    <script src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/js/vendor-bundle-all.min.js"></script>
    <script src="http://cdn.mosaicpro.biz/themekit-3.6.0/dist/themes/social-2/js/module-bundle-main.min.js"></script>
    <script type="text/javascript" src="http://www.onderbilgisayarkursu.com/deneme/js/jquery.swipebox.min.js"></script>
    <script type="text/javascript">
    $(function(){
          $( '.swipebox' ).swipebox({
            loopAtEnd:true
          });
      })
    </script>
</body>
</html>