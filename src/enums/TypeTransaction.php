<?php
  namespace src\enums;
  enum TypeTransaction:string{
    case DEPOT = "depot";
    case TRANSFERT = "transfert";
    case RETRAIT = "retrait";
    case PAIEMENT = "paiement";
  }