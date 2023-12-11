<?php

include 'class/CompteBancaire';
include 'class/GestionnaireComptes';
include 'class/FabriqueDeCompte';
include 'class/CompteEpargne';
include 'class/CompteInvestissement';
include 'class/CompteCourant';

try {
    // Crée un nouveau compte ou récupère un compte existant avec l'ID 1
    $monCompte1 = GestionnaireComptes::obtenirCompte(1);
    $monCompte1->deposerArgent(200);
    echo "Compte 1: ";
    $monCompte1->afficherSolde();

    // Crée un nouveau compte ou récupère un compte existant avec l'ID 10
    $monCompte2 = GestionnaireComptes::obtenirCompte(10);
    $monCompte2->deposerArgent(700);
    echo "Compte 2: ";
    $monCompte2->afficherSolde();
} catch (RuntimeException $error) {

    echo "Erreur : " . $error->getMessage();
}



// Test pour CompteBancaire
$compteBancaire = FabriqueDeCompte::creerCompte('CompteBancaire', 'Alice', 123456, 'EUR', false, 1000.0);
echo "Compte Bancaire créé pour " . $compteBancaire->getTitulaire() . " avec un solde de " . $compteBancaire->getSolde() . $compteBancaire->getDevise();

// Test pour CompteEpargne
$compteEpargne = FabriqueDeCompte::creerCompte('CompteEpargne', 'Bob', 654321, 'EUR', false, 2000.0);
echo "Compte Épargne créé pour " . $compteEpargne->getTitulaire() . " avec un solde de " . $compteEpargne->getSolde() . $compteEpargne->getDevise();

// Test pour CompteCourant
$compteCourant = FabriqueDeCompte::creerCompte('CompteCourant', 'Charlie', 111222, 'USD', true, 3000.0);
echo "Compte Courant créé pour " . $compteCourant->getTitulaire() . " avec un solde de " . $compteCourant->getSolde() .  $compteCourant->getDevise();

// Test pour CompteInvestissement
$compteInvestissement = FabriqueDeCompte::creerCompte('CompteInvestissement', 'Danielle', 789123, 'GBP', true, 5000.0);
echo "Compte Investissement créé pour " . $compteInvestissement->getTitulaire() . " avec un solde de " . $compteInvestissement->getSolde() . $compteInvestissement->getDevise();
