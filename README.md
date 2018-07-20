#Combination of classifiers for better recognition of handwritten arabic words : 
##Steps : 
###I - Feature extraction: 
I-1 FT method : Extract image gravity center ,  Eight directions of the Freeman , Density , contours  .. 
I-2 LM method : We used Legendre moment for extract image feature . 
###II - Classifier :
Support vector machine & Neural network 
###III - Classifier combination : 
We combine our 4 Classifier ( 2 for FT(svm & NN)  and LM(svm & NN) method ) with : 
III - 1 Majority voting 
III - 2 Borda count 
III - 3 Behavior Knowledge Space 
III - 4 Dempster Shafer 
Developed by 
Mohammed BOUKHALFA : https://github.com/mboukhalfa
Houssem Eddine ALIOUCHE  : https://github.com/oxPraGa
