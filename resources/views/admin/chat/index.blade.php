@extends('admin_layout/master')
@section('content')

<div class="container-fluid">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-msg">
                <div class="nk-msg-aside" style="width:100%;">
                    <div class="nk-msg-nav">
                        <ul class="nk-msg-menu">
                            <li class="nk-msg-menu-item  {{ request()->is('admin-dashboard/chats') ? 'active' : '' }}"><a href="{{ url('admin-dashboard/chats') ?? '' }}">All</a></li>
                            <li class="nk-msg-menu-item {{ request()->is('admin-dashboard/chats-active') ? 'active' : '' }}"><a href="{{ url('admin-dashboard/chats-active') ?? '' }}">Active</a></li>
                            <li class="nk-msg-menu-item {{ request()->is('admin-dashboard/chats-closed') ? 'active' : '' }}"><a href="{{ url('admin-dashboard/chats-closed') ?? '' }}">Closed</a></li>
                            <li class="nk-msg-menu-item ms-auto"><a href="" class="search-toggle toggle-search"
                                    data-target="search"><em class="icon ni ni-search"></em></a></li>
                        </ul><!-- .nk-msg-menu -->
                        <div class="search-wrap" data-search="search">
                            <div class="search-content">
                                <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em
                                        class="icon ni ni-arrow-left"></em></a>
                                <input type="text" class="form-control border-transparent form-focus-none"
                                    placeholder="Search by user or message">
                                <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                            </div>
                        </div><!-- .search-wrap -->
                    </div><!-- .nk-msg-nav -->
                    <div class="nk-msg-list" data-simplebar="init">
                        <div class="simplebar-wrapper" style="margin: 0px;">
                            <div class="simplebar-height-auto-observer-wrapper">
                                <div class="simplebar-height-auto-observer"></div>
                            </div>
                            <div class="simplebar-mask">
                                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                    <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                        aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
                                        <div class="simplebar-content" style="padding: 0px;">
                                            
                                            <div class="nk-msg-item is-unread" data-msg-id="3">
                                                <div class="nk-msg-media user-avatar bg-purple">
                                                    <span>MJ</span>
                                                </div>
                                                <div class="nk-msg-info">
                                                    <div class="nk-msg-from">
                                                        <div class="nk-msg-sender">
                                                            <div class="name">Mayme Johnston</div>
                                                        </div>
                                                        <div class="nk-msg-meta">
                                                            <div class="date">11 Jan</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-msg-context">
                                                        <div class="nk-msg-text">
                                                            <h6 class="title">I can not submit kyc application</h6>
                                                            <p>Hello support! I can not upload my documents on kyc
                                                                application.</p>
                                                        </div>
                                                        <div class="nk-msg-lables">
                                                            <div class="unread"><span class="badge bg-primary">2</span>
                                                            </div>
                                                            <div class="asterisk"><a href="#"><em
                                                                        class="asterisk-off icon ni ni-star"></em><em
                                                                        class="asterisk-on icon ni ni-star-fill"></em></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="simplebar-placeholder" style="width: auto; height: 1403px;"></div>
                        </div>
                        <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                            <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                        </div>
                        <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                            <div class="simplebar-scrollbar"
                                style="height: 25px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                        </div>
                    </div><!-- .nk-msg-list -->
                </div>
                
            </div>
        </div>
    </div>
</div>


@endsection