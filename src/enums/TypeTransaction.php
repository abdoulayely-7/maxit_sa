<?php
  namespace src\enums;
  enum TypeTransaction:string{
    case DEPOT = "DEPOT";
    case TRANSFERT = "TRANSFERT";
    case RETRAIT = "RETRAIT";
    case PAIEMENT = "PAIEMENT";
  }