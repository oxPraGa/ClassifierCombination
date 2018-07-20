function [ Fenetres ]=fenetrage(Image,Nb_fenetres,Chevauchement)

% le fenetrage consiste a diviser l'image en blocs
% ici on divise l'image a 4 fenetres 
% le largeur de la fenetre est le 1er entier superieur au largeur/4

[x y]=size(Image);
if(x>0 && y>12)
    while(mod(y+Chevauchement*(Nb_fenetres-1),Nb_fenetres)~=0)
        x=x+1;y=y+1;
       Image = imresize(Image, [x y],'nearest');
    end
Largeur_fenetre=(y+Chevauchement*(Nb_fenetres-1))/Nb_fenetres;
Fin = y;

Fenetres=cell(Nb_fenetres,1);
for k=1:Nb_fenetres
    Fenetres{k}=Image(1:x,Fin-Largeur_fenetre+1:Fin);
    Fin=Fin-Largeur_fenetre+Chevauchement;
end
else
    %%%%%%%%%%%%%%%%%%%% Erreur en fichier !!!!!!!!!!!!!!!!!!!!
    disp('Erreur image trop petite !');
    Fenetres=cell(0);
end

end

