#include main.h


void suprimer()
{
    if (nbrTaches <= 0)
    {
        printf("\n\t\033[0;31m~n'est pas de tache pour suprimer~\033[0;37m\n");
        return;
    }
    // int s;

    while (1)
    {
        if (nbrTaches <= 0)
        {
            printf("n'est pas de tache pour suprimer \n");
            break;
        }
        int i, d, s, n;
    si:
        printf("\033[0;33msi vous voulez tout supprimer entrer (0) sinon entrer (1)  : ");
        printf("\nRevenez au menu principal (2) :   ");
        scanf("%d", &s);
        if (s == 2)
        {
            return;
        }

        if (!s)
        {
            nbrTaches = 0;
            printf("\n\t~Tout est suprimer~");
            break;
        }

    start:
        printf("entre le id de la tache : ");
        scanf("%d", &n);
        i = chrParid(n);
        if (i == -1)
        {
            printf("\t\033[0;31mid invalid !!\033[0;37m\n");
            goto start;
        }

        for (int n = i + 1; n < nbrTaches; n++)
        {
            tache[n - 1] = tache[n];
        }
        // Tache tmp = tache[i];
        // tache[nbrTaches - 1] = tache[i];
        // tache[i] = tache[nbrTaches - 1];
        nbrTaches--;
        nbrsprm++;
        printf("\n\tsuprimer avec succer !!\n");
        if (nbrTaches <= 0)
        {
            printf("\n\tnombre de tahce est vide !!! \n");
            return;
        }
        char q;
        printf("un aute tache ? [Y/N] :  ");
        au:
        q = getchar();
        if (q == 'Y' || q == 'y')
        {
            continue;
        }
        else if (q == 'N' || q == 'n')
        {
            break;
        }
        else
        {
            goto au;
        }
    }
}
