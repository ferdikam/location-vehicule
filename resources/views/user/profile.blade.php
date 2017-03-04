@extends('layouts.app')

@section('page-title')
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Utilisateur</h4>
            <ol class="breadcrumb">
                <li>
                    <a href="#">Gestion des utilistaeurs</a>
                </li>
                <li class="active">
                    Profil
                </li>
            </ol>
        </div>
    </div>
@endsection

@section('content')

    <hr>
    <div class="row">
        <div class="col-sm-12">
            <div class="bg-picture text-center">
                <div class="bg-picture-overlay"></div>
                <div class="profile-info-name">
                    <img src="/assets/images/users/default-avatar.png" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                    <h4 class="m-b-5"><b>{{ $user->name }}</b></h4>
                    
                </div>
            </div>
            <!--/ meta -->
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">

            <div class="card-box m-t-20">
                <a href="#custom-modal" class="pull-right btn btn-default btn-sm waves-effect waves-light" data-animation="fadein" data-plugin="custommodal"
                   data-overlaySpeed="200" data-overlayColor="#36404a">Modifier profil</a>

                <div id="custom-modal" class="modal-demo">
                    <button type="button" class="close" onclick="Custombox.close();">
                        <span>&times;</span><span class="sr-only">Fermer</span>
                    </button>
                    <h4 class="custom-modal-title">Modifier mon profil</h4>
                    <div class="custom-modal-text text-left">
                        <form method="POST" action="/profile">
                            @include('user.form-profile', ['btnSubmit' => 'Modifier', 'profile' => new \App\Profile()])
                        </form>
                    </div>
                </div>
                <h4 class="m-t-0 header-title"><b>Information Personelle</b></h4>
                <div class="p-20">
                    <div class="about-info-p">
                        <strong>Nom complet</strong>
                        <br>
                        <p class="text-muted">{{ $user->name }}</p>
                    </div>
                    <div class="about-info-p">
                        <strong>Adresse électronique</strong>
                        <br>
                        <p class="text-muted">{{ $user->email }}</p>
                    </div>
                    @if(!is_null($profile))
                        <div class="about-info-p">
                            <strong>Téléphone 1</strong>
                            <br>
                            <p class="text-muted">{{ $profile->phone1 }}</p>
                        </div>
                        @if(!is_null($profile->phone2))
                            <div class="about-info-p m-b-0">
                                <strong>Téléphone 2</strong>
                                <br>
                                <p class="text-muted">{{ $profile->phone2 }}</p>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-8">

            <div class="card-box m-t-20">
                <h4 class="m-t-0 header-title"><b>Mes activités</b></h4>
                <!--<div class="p-20">
                    <div class="timeline-2">
                        <div class="time-item">
                            <div class="item-info">
                                <div class="text-muted">5 minutes ago</div>
                                <p><strong><a href="#" class="text-info">John Doe</a></strong> Uploaded a photo <strong>"DSC000586.jpg"</strong></p>
                            </div>
                        </div>

                        <div class="time-item">
                            <div class="item-info">
                                <div class="text-muted">30 minutes ago</div>
                                <p><a href="" class="text-info">Lorem</a> commented your post.</p>
                                <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                            </div>
                        </div>

                        <div class="time-item">
                            <div class="item-info">
                                <div class="text-muted">59 minutes ago</div>
                                <p><a href="" class="text-info">Jessi</a> attended a meeting with<a href="#" class="text-success">John Doe</a>.</p>
                                <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                            </div>
                        </div>

                        <div class="time-item">
                            <div class="item-info">
                                <div class="text-muted">5 minutes ago</div>
                                <p><strong><a href="#" class="text-info">John Doe</a></strong>Uploaded 2 new photos</p>
                            </div>
                        </div>

                        <div class="time-item">
                            <div class="item-info">
                                <div class="text-muted">30 minutes ago</div>
                                <p><a href="" class="text-info">Lorem</a> commented your post.</p>
                                <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                            </div>
                        </div>

                        <div class="time-item">
                            <div class="item-info">
                                <div class="text-muted">59 minutes ago</div>
                                <p><a href="" class="text-info">Jessi</a> attended a meeting with<a href="#" class="text-success">John Doe</a>.</p>
                                <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                            </div>
                        </div>
                    </div>
                </div>-->
            </div>
    </div>

@endsection