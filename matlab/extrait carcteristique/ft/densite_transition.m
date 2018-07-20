function [ Densite Transitions ] =densite_transition(Image)

m=ceil(size(Image,1)/2);
n=ceil(size(Image,2)/3);

Densite=blkproc(Image,[m,n],@densite);
[a,b]=size(Densite);
Densite=reshape(Densite,1,a*b);
Densite =[Densite,densite(Image)];

Transitions=blkproc(Image,[m,n],@transitions);
[a,b]=size(Transitions);
Transitions=reshape(Transitions,1,a*b);
Transitions=[Transitions,transitions(Image)];
end% [ Densite Transitions ] =densite_transition(Image);

