#inlude main.h


void ajtTache(int a)
{
    time_t tt = time(NULL);
    struct tm *dt = localtime(&tt);
    int D = dt->tm_mday;
    int M = dt->tm_mon + 1;
    int Y = dt->tm_year + 1900;
    int N = 0;
    int d;

    if (nbrTaches >= MAX_TACHES)
    {
        printf("\033[0;31m\nLa liste de taches est pleine. Impossible d'ajouter plus de taches.\033[0;37m\n");
        return;
    }
    if (!a)
    {
        return;
    }

    Tache buffer;
    while (N < a)
    {
        buffer.criation.anne = Y;
        buffer.criation.mois = M;
        buffer.criation.jour = D;
        buffer.id = nbrTaches + 1 + nbrsprm;
        printf("\033[0;36mTitre de la %d tache : \033[0;37m", N + 1);
        scanf(" %[^\n]", buffer.titre);

        printf("\033[0;36mDescription de la %d tache   : \033[0;37m", N + 1);
        scanf(" %[^\n]", buffer.descr);
        printf("\033[0;33m==================== on 'est on %d/%d/%d =====================\033[0;37m\n", D, M, Y);
        printf("\033[0;36mentre le deadline  : \033[0;37m\n");
    anne:
        printf("\n\t\033[0;36mentrer l'annee :  \033[0;37m");
        scanf(" %d", &d);
        if (d < Y || d > (Y + 70))
        {
            printf("\n\t\t\033[0;31minvalid anne !!!\033[0;37m\n");
            goto anne;
        }
        buffer.deadline.anne = d;
        int y = d;
    moi:
        printf("\n\t\033[0;36mentrer le moi  :  \033[0;37m");
        scanf(" %d", &d);
        if ((d < 1 || d > 12) || (d < M && y - Y < 1))
        {
            printf("\n\t\t\033[0;31minvalid moi !!!\033[0;37m\n");
            goto moi;
        }
        buffer.deadline.mois = d;
        int m = d;
    jr:
        int a;
        printf("\n\t\033[0;36mentrer le jour  :  \033[0;3m");
        // printf("  %d  ",D);
        scanf(" %d", &a);
        if ((a < 1 || a > 31) || ((a < D) && (m - M < 1 && y - Y < 1)))
        {
            printf("\n\t\t\033[0;31minvalid jour !!!\033[0;37m\n");
            goto jr;
        }
        buffer.deadline.jour = a;
        buffer.joures = timecalc(buffer.deadline.anne, buffer.deadline.mois, buffer.deadline.jour);
    status:
        int s;
        printf("\n\033[0;36mStatut de de la %d tache :\n\tpour a realiser entrer (1) .\n\tpour en cours (2) .\n\tpour finalisee (3) .\033[0;37m\n", N + 1);
        printf("=======================================> ");
        scanf(" %d", &s);
        if (s == 1)
        {
            strcpy(buffer.statuses.statusname, "a realiser");
            buffer.statuses.tag = 1;
        }
        else if (s == 2)
        {
            strcpy(buffer.statuses.statusname, "en cours");
            buffer.statuses.tag = 2;
        }
        else if (s == 3)
        {
            strcpy(buffer.statuses.statusname, "finalisee");
            buffer.statuses.tag = 3;
        }
        else
        {
            puts("\n\t\t\033[0;31minvalide choix !!!\033[0;37m");
            goto status;
        }
        tache[nbrTaches++] = buffer;
        N++;
    }
    printf("\n\t\033[0;33m~Tache ajoutee avec succes!~\033[0;37m\n");
}
