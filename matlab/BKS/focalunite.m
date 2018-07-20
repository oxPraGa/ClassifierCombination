function [FU] = focalunite(D)
L= size(D,1);
FU=zeros(L,1);
for i=1:L
    [~,FU(i)]=max(D(i,:));
end

end

