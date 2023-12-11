void modify()
{
    while (1)
    {
        if (nbrTaches <= 0)
        {
            printf("\n\t\033[0;31m~n'est pas de tache pour modifier~ \033[0;37m\n");
            return;
        }
        int n;
        int i, d;
    start:
        printf("\033[0;35mentre le id de la tache : \033[0;37m");
        scanf("%d", &n);
        i = chrParid(n);
        if (i == -1)
        {
            printf("\tid invalid \n");
            goto start;
        }
    modi:
        printf("\033[0;36m");
        printf("\tpour  Modifier la description entrer (1) .\n ");
        printf("\tpour Modifier le statut d'une tache (2) .\n");
        printf("\tModifier le deadline d'une tache entrer (3) .\n");
        printf("\tRevenez au menu principal (4) .\n");
        printf("\033[0;37m");
        printf("==================================================> ");
        scanf("%d", &d);
        if (d == 4)
        {
            return;
        }

        if (midifyer(d, i) == -1)
        {
            printf("\n\t\t\033[0;31minvalid choix ! \033[0;37m\n\n");
            goto modi;
        }

        char c;
        printf("\t\033[0;33mvoulez-vous le modifier des autres tache ? [Y/N] : \033[0;37m");
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
