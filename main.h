#ifndef MAIN_H
#define MAIN_H


#include <stdio.h>
#include <stdlib.h>
#include <string.h>


#include <time.h>
#include <ctype.h>




#define MAX_TACHES 100

typedef struct s_date
{
    int anne;
    int mois;
    int jour;
} date;
typedef struct s_status
{
    char statusname[20];
    int tag;
} status;

typedef struct s_tache
{
    int id;
    char titre[50];
    char descr[100];
    date deadline;
    status statuses;
    int joures;
    date criation;
} Tache;

Tache troi[MAX_TACHES];
int nbrtroi = 0;

Tache tache[MAX_TACHES];
int nbrTaches = 0;

int nbrsprm = 0;
