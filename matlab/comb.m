function [ classe,bel ] = comb(Ilien )
load Var_borda;

I=imread(Ilien);
I=im2bw(I);
I=~I;
addpath(genpath('./extrait carcteristique'));
[ Vect_ft ] = features(I);
[ Vect_lm ] = leg_mom(I);
rmpath(genpath('./extrait carcteristique'));

addpath(genpath('./simuler'));
[ classe_nn_ft,sortie_nn_ft ] = nn_ft( Vect_ft,net_ft);
[ classe_nn_lm,sortie_nn_lm ] = nn_lm( Vect_lm,net_lm);
[ classe_svm_ft,sortie_svm_ft ] = svm_ft( Vect_ft,model_ft,minmax_svm_ft_s);
[ classe_svm_lm,sortie_svm_lm ] = svm_lm( Vect_lm,model_lm);
rmpath(genpath('./simuler'));
D=[sortie_nn_ft;
    sortie_nn_lm;
    sortie_svm_ft;
    sortie_svm_lm;
];
disp (D);

%%%%%%%%%%%%%%%%%%% Methode vote majorite %%%%%%%%%%%%%%%%%%%%%%%%
% addpath(genpath('./Methode vote majorite'));
% [classe,bel,Dc]=voteMajoritaire(D)
% rmpath(genpath('./Methode vote majorite'));
%%%%%%%%%%%%%%%%%%% %%%%%%%%%%%%%%%%%%%%%%%

%%%%%%%%%%%%%%%%%%% Methode dorda %%%%%%%%%%%%%%%%%%%%%%%%
% addpath(genpath('./Methode borda'));
% [classe,bel,Dc]=borda(D)
% rmpath(genpath('./Methode borda'));
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

addpath(genpath('./DS'));
load DT;
[classe,bel]=DS(D,DT);
rmpath(genpath('./DS'));

% addpath(genpath('./BKS'));
% load Var_BKS;
% [classe,bel]=BKS(D,unts,ResApp);
% rmpath(genpath('./BKS'));

File=fopen('result.txt','w');
fprintf(File,'%d',classe);
fclose(File);
exit;
end

