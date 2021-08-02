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
                    <div class="contact">
                        <div class="contact__socials">
                            <h5>Suivez-nous sur les réseaux !</h5>
                            <ul>
                                <li>
                                    <i class="contact__socials__icon twitter"></i>
                                    <span>@filsdepute</span>
                                </li>
                                <li>
                                    <i class="contact__socials__icon instagram"></i>
                                    <span>@filsdepute</span>
                                </li>
                                <li>
                                    <i class="contact__socials__icon discord"></i>
                                    <span>@filsdepute</span>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="contact__form">
                            <h5>Ecrivez-nous</h5>
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