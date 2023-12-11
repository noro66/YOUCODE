#inlude main.h


void triPard()
{

    for (int i = 0; i < nbrTaches - 1; i++)
    {
        for (int j = 0; j < nbrTaches - i - 1; j++)
        {
            if (tache[j].joures > tache[j + 1].joures)
            {
                Tache tmp = tache[j];
                tache[j] = tache[j + 1];
                tache[j + 1] = tmp;
            }
        }
    }
    affichage(tache, nbrTaches);
}
