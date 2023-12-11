#inlude main.h


void triParTitre(Tache tab[], int nbr)
{

    for (int i = 0; i < nbr - 1; i++)
    {
        for (int j = 0; j < nbr - i - 1; j++)
        {
            if (strcmp(tab[j].titre, tab[j + 1].titre) > 0)
            {
                Tache tmp = tab[j];
                tab[j] = tab[j + 1];
                tab[j + 1] = tmp;
            }
        }
    }
    affichage(tab, nbr);
}
