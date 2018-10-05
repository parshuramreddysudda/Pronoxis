<?php



class Tokenizer{
    

 function  checkifVaribles($chkVarSendline,$chkVarLines,$chkSendDecLine_num)
{

//    print_r($chkVarSendline);
   
    $noofelelments=count($chkVarSendline);
   
    
    for($i=1;$i<$noofelelments;$i++)
    {
        $tempCut=substr($chkVarSendline[$i],0,1);
        if(strcmp($tempCut,'$')==0)
        {
//            echo "<br>Trimmed Var ".$chkVarSendline[$i];
            $Token = new Tokenizer();
            
            $Token->printDeclaration($chkVarSendline[$i],$chkVarLines,$chkSendDecLine_num);
        }
        
        
    }
    
    
      
    echo "<br>";   
}


function printDeclaration($prtDecVar,$prtDecLines,$prtDecLine_num)   //Dec==Declaration
{
   
    foreach ($prtDecLines as $chkprtDecLine_num => $chkprtDecLine)
    {
         
        
        
        $sendprtDecLine=htmlspecialchars($chkprtDecLine);
        $trimDecprtSendline = multiexplode($sendprtDecLine); 
        $trimmed_DecprtSendline=array_map('trim',$trimDecprtSendline);
      
        if(strcmp($prtDecVar,$trimmed_DecprtSendline[0])==0)
        { 
           
 
            echo "<br>";
//            echo $prtDecVar;
//            echo $chkprtDecLine_num.", ";
//            echo $prtDecLine_num;
           
            if($chkprtDecLine_num==$prtDecLine_num)
            {
                echo "Same Elements ";
                break;
               
            }
            else
            {
                 echo $chkprtDecLine;
                 $chkprtDecLine=htmlspecialchars($chkprtDecLine);
                 $chkprtDecLine = multiexplode($chkprtDecLine);
                 $chkprtDecLine=array_map('trim',$chkprtDecLine);
              $Token = new Tokenizer();
            
            $Token->checkifVaribles($chkprtDecLine,$prtDecLines,$chkprtDecLine_num);
            }
        }
        else if(count($trimmed_DecprtSendline)>1)     //To check the Variable declared after a space or in the a[1] from starting .
        {
            if(strcmp($prtDecVar,$trimmed_DecprtSendline[1])==0)
        { 
           
 
            echo "<br>";
//            echo $prtDecVar;
//            echo $chkprtDecLine_num.", ";
//            echo $prtDecLine_num;
           
            if($chkprtDecLine_num==$prtDecLine_num)
            {
                echo "Same Elements ";
                break;
               
            }
            else
            {
                 echo $chkprtDecLine;
                 $chkprtDecLine=htmlspecialchars($chkprtDecLine);
                 $chkprtDecLine = multiexplode($chkprtDecLine);
                 $chkprtDecLine=array_map('trim',$chkprtDecLine);
                 $Token = new Tokenizer();
            
            $Token->checkifVaribles($chkprtDecLine,$prtDecLines,$chkprtDecLine_num);
            }
        }
        }
        
        
    }
}
}










?>