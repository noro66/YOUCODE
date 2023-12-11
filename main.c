#include main.h


int main()
{
    int choix, f;
    int n;

    while (1)
    {

        printf("\n\n\t\033[0;32m~ Menu principal~\n");
        printf("====================================\n");
        printf("1. Ajouter nouvelles taches .\n");
        printf("2. Afficher la liste des toutes les taches (triees).\n");
        printf("3. Modifier un tache .\n");
        printf("4. Suprimer un tache .\n");
        printf("5. Rechercher les Taches  .\n");
        printf("6. Statistiques .\n");
        printf("7.  Quitere  .\n");
        printf("=========>Entrez votre choix : \033[0;37m");
        scanf("%d", &choix);
        switch (choix)
        {
        case 1:
        nmbr:
            printf("\n\033[0;36mentre le nombre de taches : \033[0;37m");
            scanf("%d", &n);
            if (!n)
            {
                break;
            }

            if (n <= 0)
            {
                printf("\033[0;31m\n\tnombre de tache invalid !\033[0;37m\n");
                goto nmbr;
            }
            else if (n > 100)
            {
                printf("\n\t\033[0;36m~tu passes les limit des taches~\033[0;37m\n");
                goto nmbr;
            }
            else if (n > 10)
            {
                printf("\n\t\033[0;33m~c'est traux mai pas problem~\033[0;37m\n");
            }

            ajtTache(n);
            break;
        case 2:
            AfficherTaches();
            break;
        case 3:
            modify();
            break;
        case 4:
            suprimer();
            break;
        case 5:
            rechercher();
            break;
        case 6:
            statis();
            break;
        case 7:
            printf("\n\t\033[0;35mAu revoir!\033[0;37m\n\n");
            exit(0);
        default:
            printf("\n\t\033[0;31m  Choix invalide !!!\n\t Veuillez reessayer !\033[0;37m\n");
        }
    }
}

