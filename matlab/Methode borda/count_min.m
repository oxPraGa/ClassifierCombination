%fonction de classement
function min=count_min(vec,val)
min=1;
for i=1:size(vec)
    if(val>vec(i))
        min=min+1;
    end
end
end