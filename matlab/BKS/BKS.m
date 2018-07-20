function [ classe,bel ] = BKS( D,unts,ResApp )

FU=focalunite(D);
pos=chercherPos(D,unts,FU);
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
%%%%%% affichage des resultats %%%%%%
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
somme=sum(ResApp(:,pos));
if(somme>0)
[bel,classe]=max(ResApp(:,pos));
bel = bel/somme;
else
    [bel,classe]= max(D(2,:));
end

end

