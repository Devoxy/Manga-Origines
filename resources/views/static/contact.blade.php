@extends('template.front')

@section('title', 'Nous contacter')

@section('content')
<div class="container" style="margin-top: 50px;">
    <div class="container-sidebar">
        <div class="container-sidebar__content">
            <div class="block" id="contact">
                <div class="block__title contact">
                    <h3>Contactez-nous !</h3>
                </div>
                <div class="block__content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut neque ante, commodo non aliquam vel, fermentum in ante. Nam accumsan enim eu odio posuere tincidunt. Integer imperdiet ac enim in rhoncus. Ut at facilisis quam. Quisque lacus quam, tempor quis libero ac, tincidunt placerat sapien.</p>
                    <img src="/images/static/ad.png" style="width: 100%; padding: 10px 0px;">
                    <div class="section-contact">
                        <div class="section-contact__form">
                            <h5><i class="fa fa-comment"></i> Laissez-nous un<br><span>message !</span></h5>
                            <form type="post">

                                @csrf

                                <div class="form-group">
                                    <label>Votre nom</label>
                                    <input type="text" class="form-control" required>
                                </div>

                                 <div class="form-group">
                                    <label>Votre email</label>
                                    <input type="text" class="form-control" required>
                                </div>

                                 <div class="form-group">
                                    <label>Votre message</label>
                                    <textarea class="form-control" required></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="section-contact__socials">
                            <h5><i class="fa fa-share-alt-square"></i> Suivez-nous sur <br><span>les réseaux !</span></h5>
                            <ul>
                                <li>
                                    <i class="section-contact__socials__icon twitter"></i>
                                    <span>@filsdepute</span>
                                </li>
                                <li>
                                    <i class="section-contact__socials__icon instagram"></i>
                                    <span>@filsdepute</span>
                                </li>
                                <li>
                                    <i class="section-contact__socials__icon discord"></i>
                                    <span>@filsdepute</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-sidebar__sidebar">
            @include('template.sidebar')
        </div>
    </div>
</div>
@endsection