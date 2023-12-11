#include main.h



void affichtache(int i)
{
    printf("\033[0;32m\n");
    printf("ID : %d\n", tache[i].id);
    printf("Titre : %s\n", tache[i].titre);
    printf("descr : %s\n", tache[i].descr);
    printf("Deadline : %d", tache[i].deadline.anne);
    printf("/%d", tache[i].deadline.mois);
    printf("/%d\n", tache[i].deadline.jour);
    printf("Statut : %s\n", tache[i].statuses.statusname);
    printf("\n");
    printf("\033[0;37m");
}
