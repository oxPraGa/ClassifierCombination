function [ output_args ] = api( image , descipteur )
    %%%%%%%%%%%%%%%%%%%%%%%% xml %%%%%%%%%%%%%%%%%%%%%%%%%%
    docNode = com.mathworks.xml.XMLUtils.createDocument... 
        ('root_element')
    docRootNode = docNode.getDocumentElement;
    %%%%%%%%%%%%%%%%%%%%%%%% end xml%%%%%%%%%%%%%%%%%%%%%%%
    I=imread(image);
    I=im2bw(I);
    I=~I;
    addpath(genpath('./extrait carcteristique'));
    % descipeur lm
    if strcmp (descipteur , 'lm')
     [ Vect_lm ] = leg_mom(I);
     for i=1:100
        thisElement = docNode.createElement('val'); 
       thisElement.appendChild... 
            (docNode.createTextNode(sprintf('%s',Vect_lm(i,1))));
        docRootNode.appendChild(thisElement);
     end
    end
    
    xmlFileName = ['api.xml'];
    xmlwrite(xmlFileName,docNode);
    exit;
end

