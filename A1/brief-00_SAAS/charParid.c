#include mian.h


int chrParid(int a)
{
    for (int i = 0; i < nbrTaches; i++)
    {
        if (tache[i].id == a)
        {
            return i;
        }
    }
    return -1;
}
