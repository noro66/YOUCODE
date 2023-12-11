#inlude main.h


int midifyer(int d, int i)
{
    time_t tt = time(NULL);
    struct tm *dt = localtime(&tt);
    int jour = dt->tm_mday;
    int mois = dt->tm_mon + 1;
    int anne = dt->tm_year + 1900;
    int N = 0;

    char buffer[100];
    int n, s;
    if (d == 1)
    {
        printf("\033[0;35mentre la modification de la description ici : \033[0;37m ");
        scanf(" %[^\n]", buffer);
        strcpy(tache[i].descr, buffer);
    }
    else if (d == 2)
    {
        printf("\033[0;35mentre la modification de le statut ici :  \033[0;37m\n");
    status:
        printf("\033[0;36mStatut de la tache :\n  pour a realiser entrer (1) :\n  pour en cours (2) :\n  pour finalisee (3) : \033[0;36m");
        scanf(" %d", &s);
        if (s == 1)
        {
            strcpy(tache[i].statuses.statusname, "a realiser");
            tache[i].statuses.tag = 1;
        }
        else if (s == 2)
        {
            strcpy(tache[i].statuses.statusname, "en cours");
            tache[i].statuses.tag = 2;
        }
        else if (s == 3)
        {
            strcpy(tache[i].statuses.statusname, "finalisee");
            tache[i].statuses.tag = 3;
        }
        else
        {
            puts("\n\t\033[0;31minvalide input \033[0;37m\n");
            goto status;
        }
    }
    else if (d == 3)
    {
        printf("\033[0;35mentre la modification de le deadline ici :  \033[0;37m");
    did:
        printf("\n\t\033[0;35mentre l'anne : \033[0;37m");
        scanf("%d", &n);
        if (n < 2023 || n > 2100)
        {
            printf("\n\t\033[0;31minvalid annee !!\033[0;37m\n");
            goto did;
        }
        tache[i].deadline.anne = n;
        int y = n;
    mo:
        printf("\n\t\033[0;35mentre le moi : \033[0;37m");
        scanf("%d", &n);
        if ((n < 1 || n > 12) || (n < mois && y - y < 1))
        {
            printf("\n\t\033[0;31minvalid moi !!\033[0;37m\n");
            goto mo;
        }
        tache[i].deadline.mois = n;
        int m = n;
    jo:
        printf("\n\t\033[0;35mentre le jour : \033[0;37m");
        scanf("%d", &n);
        if ((n < 1 || n > 31) || (n < jour && (m - mois < 1 && y - anne < 1)))
        {
            printf("\n\t\033[0;35minvalid jour !!\033[0;37m\n");
            goto jo;
        }
        tache[i].deadline.jour = n;
        tache[i].joures = timecalc(tache[i].deadline.anne, tache[i].deadline.mois, tache[i].deadline.jour);
    }
    else
    {
        return -1;
    }
}
