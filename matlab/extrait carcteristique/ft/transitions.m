function [ Transitions ] = transitions(Image)

Transitions=zeros(1,2);

[x y]=size(Image);

for i=1:x
    for j=1:y-1
        if ((Image(i,j)==1) && (Image(i,j+1)==0)) || ((Image(i,j)==0) && (Image(i,j+1)==1))
            Transitions(1)=Transitions(1)+1;
        end
    end
end

for i=1:x-1
    for j=1:y
        if ((Image(i,j)==1) && (Image(i+1,j)==0)) || ((Image(i,j)==0) && (Image(i+1,j)==1))
            Transitions(2)=Transitions(2)+1;
        end
    end
end

end
