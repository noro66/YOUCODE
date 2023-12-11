#include main.h

void affichage(Tache T[], int a)
{
    for (int i = 0; i < a; i++)
    {
        printf("\033[0;35m");
        printf("\nID : %d\n", T[i].id);
        printf("Titre : %s\n", T[i].titre);
        printf("descr : %s\n", T[i].descr);
        printf("Deadline : %d", T[i].deadline.anne);
        printf("/%d", T[i].deadline.mois);
        printf("/%d\n", T[i].deadline.jour);
        printf("Statut : %s\n", T[i].statuses.statusname);
        printf("Date de creation : %d", T[i].criation.jour);
        printf("/%d", T[i].criation.mois);
        printf("/%d\n", T[i].criation.anne);
        printf("\033[0;37m\n");
    }
}
