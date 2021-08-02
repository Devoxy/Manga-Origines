@extends('template.front')

@section('title', 'Rejoindre le VIP')

@section('content')
<div class="container">
    <div class="vip-banner">
        <img src="/images/static/background-vip.png" style="width: 100%; padding: 40px 0px;">
    </div>

    <div class="vip-title">
        <h3>
            VOUS SOUHAITEZ NOUS SOUTENIR TOUT EN AYANT ACCÈS À DU CONTENUS EXCLUSIF ?
        </h3>
    </div>

    <div class="vip-bigtitle">
        <h2>
            DEVENEZ <span>VIP !</span><br>
            DÉCOUVREZ NOS OFFRES !
        </h2>
    </div>

    <div class="vip-pricing">
        <div class="vip-pricing__table">
            <div class="vip-pricing__table__icon">
                <img src="/images/static/icons/bonfire.png">
            </div>
            <div class="vip-pricing__table__title">Soldat</div>
            <div class="vip-pricing__table__description">
            Tu souhaites le strict minimum ? Cette offre te conviendra parfaitement, soldat.
            </div>
        </div>

        <div class="vip-pricing__table">
            <div class="vip-pricing__table__icon">
                <img src="/images/static/icons/king.png">
            </div>
            <div class="vip-pricing__table__title">King</div>
            <div class="vip-pricing__table__description">
            Tu es avides et tu désires que tout puisses t'appartenir ? Ce pack est fait pour toi, alors.
            </div>
        </div>

        <div class="vip-pricing__table recommanded">
            <div class="vip-pricing__table__icon">
                <img src="/images/static/icons/diamond.png">
            </div>
            <div class="vip-pricing__table__title">Gardien</div>
            <div class="vip-pricing__table__description">
            Tu veux un accès prioritaire pour nos dernières publications ? Voilà ce qu'il te faut.
            </div>
        </div>

    </div>

    <div class="vip-banner">
        <img src="/images/static/background-vip.png" style="width: 100%; padding: 40px 0px;">
    </div>
</div>
@endsection