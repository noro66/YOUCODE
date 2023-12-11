#include main.h


void statis()
{

    if (nbrTaches <= 0)
    {
        printf("\n\t\033[0;31mn'est pas de tache !! \033[0;37m\n");
        return;
    }
    while (1)
    {
        int n;
    f:
        printf("\033[0;34m");
        printf("pour afficher le nombre total des taches entrer (1) : \n");
        printf("pour afficher le nombre de taches completes et incompletes entrer (2) : \n");
        printf("pour afficher le nombre de jours restants jusqu'au delai de chaque tache (3) : \n");
        printf("Revenez au menu principal (4)\033[0;37m\n");
        printf("======================================================================================> ");
        scanf("%d", &n);
        if (n == 1)
        {
            printf("\033[0;31mle nombre total des taches est :  %d \033[0;37m\n", nbrTaches);
        }
        else if (n == 2)
        {
            int C = 0, I = 0;
            for (size_t i = 0; i < nbrTaches; i++)
            {
                if (tache[i].statuses.tag == 3)
                {
                    C++;
                }
                else
                {
                    I++;
                }
            }
            printf("\n\t\033[0;35mle nombre de taches completes est : %d", C);
            printf("\n\tle nombre de taches incompletes est : %d\033[0;37m\n\n", I);
        }
        else if (n == 3)
        {
            for (size_t i = 0; i < nbrTaches; i++)
            {
                printf("\033[0;34m");
                printf("\nID : %d\n", tache[i].id);
                printf("Titre : %s\n", tache[i].titre);
                printf("le nombre de jours restants : %d j\n", tache[i].joures);
                printf("\033[0;37m\n");
            }
        }
        else if (n == 4)
        {
            break;
        }

        else
        {
            printf("\t\033[0;31mchoix invalid !!\033[0;37m");
            goto f;
        }
        char v;
        printf("\033[0;33mvoulez-vous  des autres static [Y/N] ?\033[0;37m ");
        strt:
        v = getchar();
        if (v == 'Y' || v == 'y')
            continue;
        else if (v == 'N' || v == 'n')
            break;
        else
        {
            goto strt;
        }
    }
}
