#include main.h


void rechercher()
{
    while (1)
    {
        if (nbrTaches <= 0)
        {
            printf("\n\t\033[0;31mNombre des taches est vide !!\033[0;37m\n");
            return;
        }
        int n;
        int i, d, r;

        printf("\033[0;36mpour recherchrer par id entrer (1) :\npour rechercher par titre entrer (2) : ");
        printf("\nRevenez au menu principal (3) :  \033[0;37m");
    chr:
        scanf("%d", &r);
        if (r < 1 || r > 3)
        {
            printf("\t\033[0;31minvalid choix !!\033[0;31m");
            goto chr;
        }
        if (r == 1)
        {
        start:
            printf("\033[0;36mentre le id de la tache : \033[0;37m");
            scanf("%d", &n);
            i = chrParid(n);
            if (i == -1)
            {
                printf("\t\033[0;31mid invalid \033[0;37m\n");
                goto start;
            }
            affichtache(i);
        }
        else if (r == 2)
        {
        bf:
            char buffer[50];
            printf("\033[0;36mentre le titre de la tache : \033[0;37m");
            scanf(" %s", buffer);
            i = chrPart(buffer);
            if (i == -1)
            {
                ("\t\033[0;37mtitre invalid \033[0;37m\n");
                goto bf;
            }
            affichtache(i);
        }
        else if (r == 3)
        {
            return;
        }

        char c;
        printf("\033[0;33mvoulez-vous rechercher autres tache ? [Y/N] : \033[0;37m");
    ask:
        c = getchar();
        if (c == 'Y' || c == 'y')
        {
            continue;
        }
        else if (c == 'N' || c == 'n')
        {
            break;
        }
        else
        {
            goto ask;
        }
    }
}
