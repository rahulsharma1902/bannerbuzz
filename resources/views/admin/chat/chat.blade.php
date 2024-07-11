@extends('admin_layout/master')
@section('content')

    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-chat">
                <div class="nk-chat-body">
                        <div class="nk-chat-head">
                            <ul class="nk-chat-head-info">
                                <li class="nk-chat-body-close">
                                    <a href="#" class="btn btn-icon btn-trigger nk-chat-hide ms-n1"><em
                                            class="icon ni ni-arrow-left"></em></a>
                                </li>
                                <li class="nk-chat-head-user">
                                    <div class="user-card">
                                        <div class="user-avatar bg-purple">
                                            <span>IH</span>
                                        </div>
                                        <div class="user-info">
                                            <div class="lead-text">Iliash Hossain</div>
                                            <div class="sub-text"><span class="d-none d-sm-inline me-1">Active </span>
                                                35m ago</div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <ul class="nk-chat-head-tools">
                                
                                <li class="d-none d-sm-block">
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger text-primary"
                                            data-bs-toggle="dropdown"><em class="icon ni ni-setting-fill"></em></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a class="dropdown-item" href="#"><em
                                                            class="icon ni ni-cross-c"></em><span>Close Conversation</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                
                            </ul>
                            <div class="nk-chat-head-search">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-left">
                                            <em class="icon ni ni-search"></em>
                                        </div>
                                        <input type="text" class="form-control form-round" id="chat-search"
                                            placeholder="Search in Conversation">
                                    </div>
                                </div>
                            </div><!-- .nk-chat-head-search -->
                        </div><!-- .nk-chat-head -->
                        <div class="nk-chat-panel" data-simplebar="init">
                            <div class="simplebar-wrapper" style="margin: -20px -28px;">
                                <div class="simplebar-height-auto-observer-wrapper">
                                    <div class="simplebar-height-auto-observer"></div>
                                </div>
                                <div class="simplebar-mask">
                                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                        <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                            aria-label="scrollable content"
                                            style="height: auto; overflow: hidden scroll;">
                                            <div class="simplebar-content" style="padding: 20px 28px;">
                                                <div class="chat is-you">
                                                    <div class="chat-avatar">
                                                        <div class="user-avatar bg-purple">
                                                            <span>IH</span>
                                                        </div>
                                                    </div>
                                                    <div class="chat-content">
                                                        <div class="chat-bubbles">
                                                            <div class="chat-bubble">
                                                                <div class="chat-msg"> Hello! </div>
                                                                <ul class="chat-msg-more">
                                                                    <li class="d-none d-sm-block"><a href="#"
                                                                            class="btn btn-icon btn-sm btn-trigger"><em
                                                                                class="icon ni ni-reply-fill"></em></a>
                                                                    </li>
                                                                    <li>
                                                                        <div class="dropdown">
                                                                            <a href="#"
                                                                                class="btn btn-icon btn-sm btn-trigger dropdown-toggle"
                                                                                data-bs-toggle="dropdown"><em
                                                                                    class="icon ni ni-more-h"></em></a>
                                                                            <div
                                                                                class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                                                <ul class="link-list-opt no-bdr">
                                                                                    <li class="d-sm-none"><a
                                                                                            href="#"><em
                                                                                                class="icon ni ni-reply-fill"></em>
                                                                                            Reply</a></li>
                                                                                    <li><a href="#"><em
                                                                                                class="icon ni ni-pen-alt-fill"></em>
                                                                                            Edit</a></li>
                                                                                    <li><a href="#"><em
                                                                                                class="icon ni ni-trash-fill"></em>
                                                                                            Remove</a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="chat-bubble">
                                                                <div class="chat-msg"> I found an issues when try to
                                                                    purchase the product. </div>
                                                                <ul class="chat-msg-more">
                                                                    <li class="d-none d-sm-block"><a href="#"
                                                                            class="btn btn-icon btn-sm btn-trigger"><em
                                                                                class="icon ni ni-reply-fill"></em></a>
                                                                    </li>
                                                                    <li>
                                                                        <div class="dropdown">
                                                                            <a href="#"
                                                                                class="btn btn-icon btn-sm btn-trigger dropdown-toggle"
                                                                                data-bs-toggle="dropdown"><em
                                                                                    class="icon ni ni-more-h"></em></a>
                                                                            <div
                                                                                class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                                                <ul class="link-list-opt no-bdr">
                                                                                    <li class="d-sm-none"><a
                                                                                            href="#"><em
                                                                                                class="icon ni ni-reply-fill"></em>
                                                                                            Reply</a></li>
                                                                                    <li><a href="#"><em
                                                                                                class="icon ni ni-pen-alt-fill"></em>
                                                                                            Edit</a></li>
                                                                                    <li><a href="#"><em
                                                                                                class="icon ni ni-trash-fill"></em>
                                                                                            Remove</a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <ul class="chat-meta">
                                                            <li>Iliash Hossain</li>
                                                            <li>29 Apr, 2020 4:28 PM</li>
                                                        </ul>
                                                    </div>
                                                </div><!-- .chat -->
                                                <div class="chat is-me">
                                                    <div class="chat-content">
                                                        <div class="chat-bubbles">
                                                            <div class="chat-bubble">
                                                                <div class="chat-msg"> Thanks for inform. We just solved
                                                                    the issues. Please check now. </div>
                                                                <ul class="chat-msg-more">
                                                                    <li class="d-none d-sm-block"><a href="#"
                                                                            class="btn btn-icon btn-sm btn-trigger"><em
                                                                                class="icon ni ni-reply-fill"></em></a>
                                                                    </li>
                                                                    <li>
                                                                        <div class="dropdown">
                                                                            <a href="#"
                                                                                class="btn btn-icon btn-sm btn-trigger dropdown-toggle"
                                                                                data-bs-toggle="dropdown"><em
                                                                                    class="icon ni ni-more-h"></em></a>
                                                                            <div class="dropdown-menu dropdown-menu-sm">
                                                                                <ul class="link-list-opt no-bdr">
                                                                                    <li class="d-sm-none"><a
                                                                                            href="#"><em
                                                                                                class="icon ni ni-reply-fill"></em>
                                                                                            Reply</a></li>
                                                                                    <li><a href="#"><em
                                                                                                class="icon ni ni-pen-alt-fill"></em>
                                                                                            Edit</a></li>
                                                                                    <li><a href="#"><em
                                                                                                class="icon ni ni-trash-fill"></em>
                                                                                            Remove</a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <ul class="chat-meta">
                                                            <li>Abu Bin Ishtiyak</li>
                                                            <li>29 Apr, 2020 4:12 PM</li>
                                                        </ul>
                                                    </div>
                                                </div><!-- .chat -->
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="simplebar-placeholder" style="width: auto; height: 776px;"></div>
                            </div>
                            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                            </div>
                            <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                                <div class="simplebar-scrollbar"
                                    style="height: 25px; transform: translate3d(0px, 9px, 0px); display: block;"></div>
                            </div>
                        </div><!-- .nk-chat-panel -->
                        <div class="nk-chat-editor">
                            <div class="nk-chat-editor-upload  ms-n1">
                                <a href="#" class="btn btn-sm btn-icon btn-trigger text-primary toggle-opt"
                                    data-target="chat-upload"><em class="icon ni ni-plus-circle-fill"></em></a>
                                <div class="chat-upload-option" data-content="chat-upload">
                                    <ul class="">
                                        <li><a href="#"><em class="icon ni ni-img-fill"></em></a></li>
                                        
                                    </ul>
                                </div>
                            </div>
                            <div class="nk-chat-editor-form">
                                <div class="form-control-wrap">
                                    <textarea class="form-control form-control-simple no-resize" rows="1"
                                        id="default-textarea" placeholder="Type your message..."></textarea>
                                </div>
                            </div>
                            <ul class="nk-chat-editor-tools g-2">
                                <li>
                                    <a href="#" class="btn btn-sm btn-icon btn-trigger text-primary"><em
                                            class="icon ni ni-happyf-fill"></em></a>
                                </li>
                                <li>
                                    <button class="btn btn-round btn-primary btn-icon"><em
                                            class="icon ni ni-send-alt"></em></button>
                                </li>
                            </ul>
                        </div><!-- .nk-chat-editor -->
                        <div class="nk-chat-profile" data-simplebar="init">
                            <div class="simplebar-wrapper" style="margin: 0px;">
                                <div class="simplebar-height-auto-observer-wrapper">
                                    <div class="simplebar-height-auto-observer"></div>
                                </div>
                                <div class="simplebar-mask">
                                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                        <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                            aria-label="scrollable content"
                                            style="height: 100%; overflow: hidden scroll;">
                                            <div class="simplebar-content" style="padding: 0px;">
                                                <div class="user-card user-card-s2 my-4">
                                                    <div class="user-avatar md bg-purple">
                                                        <span>IH</span>
                                                    </div>
                                                    <div class="user-info">
                                                        <h5>Iliash Hossain</h5>
                                                        <span class="sub-text">Active 35m ago</span>
                                                    </div>
                                                    <div class="user-card-menu dropdown">
                                                        <a href="#"
                                                            class="btn btn-icon btn-sm btn-trigger dropdown-toggle"
                                                            data-bs-toggle="dropdown"><em
                                                                class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li><a href="#"><em
                                                                            class="icon ni ni-eye"></em><span>View
                                                                            Profile</span></a></li>
                                                                <li><a href="#"><em
                                                                            class="icon ni ni-na"></em><span>Block
                                                                            Messages</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-profile">
                                                    <div class="chat-profile-group">
                                                        <a href="#" class="chat-profile-head" data-bs-toggle="collapse"
                                                            data-bs-target="#chat-options">
                                                            <h6 class="title overline-title">Options</h6>
                                                            <span class="indicator-icon"><em
                                                                    class="icon ni ni-chevron-down"></em></span>
                                                        </a>
                                                        <div class="chat-profile-body collapse show" id="chat-options">
                                                            <div class="chat-profile-body-inner">
                                                                <ul class="chat-profile-options">
                                                                    <li><a class="chat-option-link" href="#"><em
                                                                                class="icon icon-circle bg-light ni ni-edit-alt"></em><span
                                                                                class="lead-text">Nickname</span></a>
                                                                    </li>
                                                                    <li><a class="chat-option-link chat-search-toggle"
                                                                            href="#"><em
                                                                                class="icon icon-circle bg-light ni ni-search"></em><span
                                                                                class="lead-text">Search In
                                                                                Conversation</span></a></li>
                                                                    <li><a class="chat-option-link" href="#"><em
                                                                                class="icon icon-circle bg-light ni ni-circle-fill"></em><span
                                                                                class="lead-text">Change
                                                                                Theme</span></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div><!-- .chat-profile-group -->
                                                    <div class="chat-profile-group">
                                                        <a href="#" class="chat-profile-head" data-bs-toggle="collapse"
                                                            data-bs-target="#chat-settings">
                                                            <h6 class="title overline-title">Settings</h6>
                                                            <span class="indicator-icon"><em
                                                                    class="icon ni ni-chevron-down"></em></span>
                                                        </a>
                                                        <div class="chat-profile-body collapse show" id="chat-settings">
                                                            <div class="chat-profile-body-inner">
                                                                <ul class="chat-profile-settings">
                                                                    <li>
                                                                        <div
                                                                            class="custom-control custom-control-sm custom-switch">
                                                                            <input type="checkbox"
                                                                                class="custom-control-input"
                                                                                id="customSwitch2">
                                                                            <label class="custom-control-label"
                                                                                for="customSwitch2">Notifications</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <a class="chat-option-link" href="#">
                                                                            <em
                                                                                class="icon icon-circle bg-light ni ni-bell-off-fill"></em>
                                                                            <div>
                                                                                <span class="lead-text">Ignore
                                                                                    Messages</span>
                                                                                <span class="sub-text">You won’t be
                                                                                    notified when message you.</span>
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="chat-option-link" href="#">
                                                                            <em
                                                                                class="icon icon-circle bg-light ni ni-alert-fill"></em>
                                                                            <div>
                                                                                <span class="lead-text">Something
                                                                                    Wrong</span>
                                                                                <span class="sub-text">Give feedback and
                                                                                    report conversion.</span>
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div><!-- .chat-profile-group -->
                                                    <div class="chat-profile-group">
                                                        <a href="#" class="chat-profile-head" data-bs-toggle="collapse"
                                                            data-bs-target="#chat-photos">
                                                            <h6 class="title overline-title">Shared Photos</h6>
                                                            <span class="indicator-icon"><em
                                                                    class="icon ni ni-chevron-down"></em></span>
                                                        </a>
                                                        <div class="chat-profile-body collapse show" id="chat-photos">
                                                            <div class="chat-profile-body-inner">
                                                                <ul class="chat-profile-media">
                                                                    <li><a href="#"><img
                                                                                src="./images/slides/slide-a.jpg"
                                                                                alt=""></a></li>
                                                                    <li><a href="#"><img
                                                                                src="./images/slides/slide-b.jpg"
                                                                                alt=""></a></li>
                                                                    <li><a href="#"><img
                                                                                src="./images/slides/slide-c.jpg"
                                                                                alt=""></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div><!-- .chat-profile-group -->
                                                </div> <!-- .chat-profile -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="simplebar-placeholder" style="width: auto; height: 760px;"></div>
                            </div>
                            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                            </div>
                            <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                                <div class="simplebar-scrollbar"
                                    style="height: 25px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                            </div>
                        </div><!-- .nk-chat-profile -->
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

@endsection