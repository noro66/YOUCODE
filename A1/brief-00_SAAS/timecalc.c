#inlude main.h


int timecalc(int a, int b, int c)
{
    time_t tt = time(NULL);
    struct tm *dt = localtime(&tt);
    int jour = dt->tm_mday;
    int mois = dt->tm_mon + 1;
    int anne = dt->tm_year + 1900;

    int y = anne - a;
    int m;
    if (mois - b <= 0 && y >= 1)
    {
        y--;
        b += 12;
    }
    m = mois - b;
    int d;
    if (jour - c < 0 && m >= 1)
    {
        m--;
        c += 30;
    }
    d = jour - c;
    int days = -(d + m * 30 + y * 365);
    return days;
}
