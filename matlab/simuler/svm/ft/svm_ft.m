function [ classe,sortie ] = svm_ft( Vect_ft,model,minmax_s)

Vect_ft = mapminmax('apply',Vect_ft,minmax_s);

[~,~,pp]=svmpredict(double(0),Vect_ft',model,'-b 1 -q');

sortie=zeros(1,model.nr_class);

for k=1:model.nr_class
    sortie(model.Label(k))=pp(k);
end

[~,classe]=max(sortie);

end

