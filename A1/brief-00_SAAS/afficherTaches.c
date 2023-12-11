#inlude main.h


void AfficherTaches()
{
    if (nbrTaches == 0)
    {
        printf("\n\t\033[0;31mAucune tache trouvee.\033[0;37m\n");
        return;
    }
    while (1)
    {
        int a;
    tri:
        printf("\033[0;36mpour affichier  les taches trier :\n\tpar ordre alphabetique entrer (1).\n\tpar deadline (2).\n\tdeadline est dans 3 jours ou moins (3).\n");
        printf("\tRevenez au menu principal (4)\033[0;37m\n");
        printf("=======================>   ");
        scanf("%d", &a);
        if (a == 1)
        {
            triParTitre(tache, nbrTaches);
        }
        else if (a == 2)
        {
            triPard();
        }
        else if (a == 3)
        {
            troifun();
        }
        else if (a == 4)
        {
            return;
        }

        else
        {
            printf("\033[0;31mnombre de choix invalid\033[0;37m");
            goto tri;
        }
        int z;
        printf("\033[0;33mvoulez-vous afficher la list des taches autres fois ? [Y/N] : \033[0;37m");
    ask:
        z = getchar();
        if (z == 'Y' || z == 'y')
        {
            continue;
        }
        else if (z == 'N' || z == 'n')
        {
            break;
        }
        else
        {
            goto ask;
        }
    }
}#inlude main.h


void AfficherTaches()
{
	    if (nbrTaches == 0)
		        {
				        printf("\n\t\033[0;31mAucune tache trouvee.\033[0;37m\n");
					        return;
						    }
	        while (1)
			    {
				            int a;
					        tri:
					            printf("\033[0;36mpour affichier  les taches trier :\n\tpar ordre alphabetique entrer (1).\n\tpar deadline (2).\n\tdeadline est dans 3 jours ou moins (3).\n");
						            printf("\tRevenez au menu principal (4)\033[0;37m\n");
							            printf("=======================>   ");
								            scanf("%d", &a);
									            if (a == 1)
											            {
													                triParTitre(tache, nbrTaches);
															        }
										            else if (a == 2)
												            {
														                triPard();
																        }
											            else if (a == 3)
													            {
															                troifun();
																	        }
												            else if (a == 4)
														            {
																                return;
																		        }

													            else
															            {
																	                printf("\033[0;31mnombre de choix invalid\033[0;37m");
																			            goto tri;
																				            }
														            int z;
															            printf("\033[0;33mvoulez-vous afficher la list des taches autres fois ? [Y/N] : \033[0;37m");
																        ask:
																            z = getchar();
																	            if (z == 'Y' || z == 'y')
																			            {
																					                continue;
																							        }
																		            else if (z == 'N' || z == 'n')
																				            {
																						                break;
																								        }
																			            else
																					            {
																							                goto ask;
																									        }
																				        }
}#inlude main.h


void AfficherTaches()
{
	    if (nbrTaches == 0)
		        {
				        printf("\n\t\033[0;31mAucune tache trouvee.\033[0;37m\n");
					        return;
						    }
	        while (1)
			    {
				            int a;
					        tri:
					            printf("\033[0;36mpour affichier  les taches trier :\n\tpar ordre alphabetique entrer (1).\n\tpar deadline (2).\n\tdeadline est dans 3 jours ou moins (3).\n");
						            printf("\tRevenez au menu principal (4)\033[0;37m\n");
							            printf("=======================>   ");
								            scanf("%d", &a);
									            if (a == 1)
											            {
													                triParTitre(tache, nbrTaches);
															        }
										            else if (a == 2)
												            {
														                triPard();
																        }
											            else if (a == 3)
													            {
															                troifun();
																	        }
												            else if (a == 4)
														            {
																                return;
																		        }

													            else
															            {
																	                printf("\033[0;31mnombre de choix invalid\033[0;37m");
																			            goto tri;
																				            }
														            int z;
															            printf("\033[0;33mvoulez-vous afficher la list des taches autres fois ? [Y/N] : \033[0;37m");
																        ask:
																            z = getchar();
																	            if (z == 'Y' || z == 'y')
																			            {
																					                continue;
																							        }
																		            else if (z == 'N' || z == 'n')
																				            {
																						                break;
																								        }
																			            else
																					            {
																							                goto ask;
																									        }
																				        }
}
