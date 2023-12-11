#include main.h

void troifun()
{
    int count = 1;
    for (int i = 0; i < nbrTaches; i++)
    {
        // printf(" les jour sont %d ", tache[i].joures);
        if (tache[i].joures <= 3)
        {
            printf("\033[0;36m");
            printf("ID : %d\n", tache[i].id);
            printf("Titre : %s\n", tache[i].titre);
            printf("descr : %s\n", tache[i].descr);
            printf("Deadline : %d", tache[i].deadline.anne);
            printf("/%d", tache[i].deadline.mois);
            printf("/%d\n", tache[i].deadline.jour);
            printf("Statut : %s\n", tache[i].statuses.statusname);
            printf("\n");
            printf("\033[0;37m");
            count = 0;
        }
    }
    if (count)
    {
        printf("\n\t\033[0;31m~n'exist pas~\033[0;37m\n");
    }
}
