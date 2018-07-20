% DS
function [classe,bel]=DS(D,DT) 


[L,C]=size(D);


%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
%%%%%% appel des fonctions des traitements %%%%%%
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

%On calcule la proximité
p=phi(DT,D);
%le degré de croyance
b=belief(p);
%Le vecteur de sortie final 
res=resultat(b,100);

%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
%%%%%% renvoyer les resultats %%%%%%
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
[bel,classe]=max(res);

end %DS();