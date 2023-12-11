#include main.h



int chrPart(char tab[])
{
    int M = -1;
    for (int i = 0; i < nbrTaches; i++)
    {
        if (strcmp(tache[i].titre, tab) == 0)
        {
            return i;
        }
    }
    return M;
}
