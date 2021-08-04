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
            <div class="vip-pricing__table__list">
                <ul>
                    <li>
                        <div class="vip-pricing__table__list__title">
                            Profites d'un accès sans pubs sur PC / MOBILE
                        </div>
                        <div class="vip-pricing__table__list__text">
                            Finis les pubs chiantes et dérangeantes ! Profite d'un monde sans pubs tout en affichant ton soutiens pour notre cause !
                        </div>
                    </li>
                    <li>
                        <div class="vip-pricing__table__list__title">
                            Rôle VIP sur notre Discord
                        </div>
                        <div class="vip-pricing__table__list__text">
                            Envie de Flex ? Le Grade VIP sur notre Discord t'offrira de la renommé mais aussi te mettra en avant comme fier défenseur de la Origines !
                        </div>
                    </li>
                </ul>
            </div>
            <div class="vip-pricing__table__price">
                4.99 € / MOIS
            </div>
            <div class="vip-pricing__table__button">
                <a href="#" class="primary-button">Souscrire</a>
            </div>
        </div>

        <div class="vip-pricing__table recommanded">
            <div class="vip-pricing__table__icon">
                <img src="/images/static/icons/king.png">
            </div>
            <div class="vip-pricing__table__title">King</div>
            <div class="vip-pricing__table__description">
                Tu es avides et tu désires que tout puisses t'appartenir ? Ce pack est fait pour toi, alors.
            </div>
            <div class="vip-pricing__table__list">
                <ul>
                    <li>
                        <div class="vip-pricing__table__list__title">
                            Profites d'un accès sans pubs sur PC / MOBILE
                        </div>
                        <div class="vip-pricing__table__list__text">
                            Finis les pubs chiantes et dérangeantes ! Profite d'un monde sans pubs tout en affichant ton soutiens pour notre cause !
                        </div>
                    </li>
                    <li>
                        <div class="vip-pricing__table__list__title">
                            Rôle VIP sur notre Discord
                        </div>
                        <div class="vip-pricing__table__list__text">
                            Envie de Flex ? Le Grade VIP sur notre Discord t'offrira de la renommé mais aussi te mettra en avant comme fier défenseur de la Origines !
                        </div>
                    </li>
                    <li>
                        <div class="vip-pricing__table__list__title">
                            Accès au FastPass ! </div>
                        <div class="vip-pricing__table__list__text">
                            Marre d'attendre des nouvelles sortie ? Tu veux voir nos sorties en avant première 3 jours avant leurs publications ?! Cet ici que ça se passe ! </div>
                    </li>
                    <li>
                        <div class="vip-pricing__table__list__title">
                            Téléchargements </div>
                        <div class="vip-pricing__table__list__text">
                            Tu souhaites stockés des choses sur ton appareil pour lire ça tranquillement plus tard dans ton lit et ou avant de partir en vacance ? Le téléchargement est à portée de main avec cette œuvre ! Stock tout ce que tu veux hors-ligne ! </div>
                    </li>
                </ul>
            </div>
            <div class="vip-pricing__table__price">
                8.99 € / MOIS
            </div>
            <div class="vip-pricing__table__button">
                <a href="#" class="primary-button">Souscrire</a>
            </div>
        </div>

        <div class="vip-pricing__table ">
            <div class="vip-pricing__table__icon">
                <img src="/images/static/icons/diamond.png">
            </div>
            <div class="vip-pricing__table__title">Gardien</div>
            <div class="vip-pricing__table__description">
                Tu veux un accès prioritaire pour nos dernières publications ? Voilà ce qu'il te faut.
            </div>
            <div class="vip-pricing__table__list">
                <ul>
                    <li>
                        <div class="vip-pricing__table__list__title">
                            Profites d'un accès sans pubs sur PC / MOBILE
                        </div>
                        <div class="vip-pricing__table__list__text">
                            Finis les pubs chiantes et dérangeantes ! Profite d'un monde sans pubs tout en affichant ton soutiens pour notre cause !
                        </div>
                    </li>
                    <li>
                        <div class="vip-pricing__table__list__title">
                            Rôle VIP sur notre Discord
                        </div>
                        <div class="vip-pricing__table__list__text">
                            Envie de Flex ? Le Grade VIP sur notre Discord t'offrira de la renommé mais aussi te mettra en avant comme fier défenseur de la Origines !
                        </div>
                    </li>
                    <li>
                        <div class="vip-pricing__table__list__title">
                            Accès au FastPass ! </div>
                        <div class="vip-pricing__table__list__text">
                            Marre d'attendre des nouvelles sortie ? Tu veux voir nos sorties en avant première 3 jours avant leurs publications ?! Cet ici que ça se passe ! </div>
                    </li>
                </ul>
            </div>
            <div class="vip-pricing__table__price">
                2.99 € / MOIS
            </div>
            <div class="vip-pricing__table__button">
                <a href="#" class="primary-button">Souscrire</a>
            </div>
        </div>

    </div>

    <div class="vip-banner">
        <img src="/images/static/background-vip.png" style="width: 100%; padding: 40px 0px;">
    </div>
</div>
@endsection