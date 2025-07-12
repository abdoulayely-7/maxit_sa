<?php
enum MessageErreurEnum: string {
    case TELEPHONE_INVALIDE = "Le numéro de téléphone est invalide.";
    case PASSWORD_VIDE = "Le mot de passe est requis.";
    case CHAMP_VIDE = "Ce champ est obligatoire.";
}