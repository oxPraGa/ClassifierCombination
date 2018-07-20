%function calcul des resultats
function res=resultat(b,k)
%partie de controle des entres..
%vide sera fait apres la validation du code 
%pour l'instant on suppose que tt les entrés valides
%fin partie de controle
[L,C]=size(b);
for i=1:C
    res(i)=1;
    for j=1:L
        res(i)=res(i)*b(j,i);
    end
    res(i)=k*res(i);
end
end % resultat()