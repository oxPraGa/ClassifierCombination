% la fonction phi 
function p=phi(DT,D)
%partie de controle des entres..
%vide sera fait apres la validation du code 
%pour l'instant on suppose que tt les entrés valides
%fin partie de controle
[L,C]=size(D);

for i=1:C
    for j=1:L
       diff=DT{i}(j,:)-D(j,:);
       nrm=norm(diff);
       denominateur=1/((nrm^2)+1);
       numerateur=0;
       for k=1:C
            diff2=DT{k}(j,:)-D(j,:);
            nrm2=norm(diff2);
            numerateur=numerateur+1/((nrm2^2)+1);
       end
       p(j,i)=denominateur/numerateur;
    end
end

end % phi()