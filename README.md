# Combination of classifiers for better recognition of handwritten arabic words

## Steps

### I - Feature extraction:
*  FT method : Extract image gravity center , Eight directions of the Freeman , Density , contours .. 
*  LM method : We used Legendre moment for extract image feature . 

### II - Classifier :
Support vector machine & Neural network  
### I - Classifier combination 
We combine our 4 Classifier ( 2 for FT(svm & NN) and LM(svm & NN) method ) with : 
*  Majority voting.
*  Borda count.
*  Behavior Knowledge Space.
*  Dempster Shafer.


## Built With

* [MatLab](https://mathworks.com)
* [PHP](https://php.net) 
* JS

## Authors

* **MOHAMMED BOUKHALFA** - [bmm](https://github.com/mboukhalfa)

* **HOUSSEM EDDINE ALIOUCHE** - [PraGa](https://github.com/oxPraGa/)
