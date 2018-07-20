% la fonction de la croyance
function b=belief(p)
%partie de controle des entres..
%vide sera fait apres la validation du code 
%pour l'instant on suppose que tt les entrés valides
%fin partie de controle
[L,C]=size(p);

for i=1:C
    for j=1:L
        multp=1;
        for k=1:C
            if (i~=k)
                multp=multp*(1-p(j,k));
            end
        end
        b(j,i)=(p(j,i)*multp)/(1-p(j,i)*(1-multp));
    end
end

end % belief()