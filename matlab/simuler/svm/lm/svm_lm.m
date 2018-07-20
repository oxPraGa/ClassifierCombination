function [ classe,sortie ] = svm_lm( Vect_lm,model)



[~,~,pp]=svmpredict(double(0),Vect_lm',model,'-b 1 -q');

sortie=zeros(1,model.nr_class);

for k=1:model.nr_class
    sortie(model.Label(k))=pp(k);
end

[~,classe]=max(sortie);

end

