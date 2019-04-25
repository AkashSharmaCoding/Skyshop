<?php 

/**************************************************************************************/ 

 class Pager 

  { 

  /*********************************************************************************** 

   * int findStart (int limit) 

   * Returns the start offset based on $_GET['page'] and $limit 

   ***********************************************************************************/ 

   function findStart($limit) 

    { 

     if ((!isset($_GET['page'])) || ($_GET['page'] == "1")) 

      { 

       $start = 0; 

       $_GET['page'] = 1; 

      } 

     else 

      { 

       $start = ($_GET['page']-1) * $limit; 

      } 



     return $start; 

    } 

  /*********************************************************************************** 

   * int findPages (int count, int limit) 

   * Returns the number of pages needed based on a count and a limit 

   ***********************************************************************************/ 

   function findPages($count, $limit) 

    { 

     $pages = (($count % $limit) == 0) ? $count / $limit : floor($count / $limit) + 1; 



     return $pages; 

    } 

  /*********************************************************************************** 

   * string pageList (int curpage, int pages) 

   * Returns a list of pages in the format of " < [pages] > " 

   ***********************************************************************************/ 

   function pageList($curpage, $pages,$parameter) 

    { 

     $page_list  = ""; 



     /* Print the first and previous page links if necessary */ 

     if (($curpage != 1) && ($curpage)) 

      { 

       $page_list .= "  <a href=\"".$_SERVER['PHP_SELF']."?".$parameter."&page=1\" title=\"First Page\" class=\"links\"><<</a> "; 

      } 



     if (($curpage-1) > 0) 

      { 

       $page_list .= "<a href=\"".$_SERVER['PHP_SELF']."?".$parameter."&page=".($curpage-1)."\" title=\"Previous Page\" class=\"links\">Prev</a> "; 

      } 



     /* Print the numeric page list; make the current page unlinked and bold */ 

     for ($i=1; $i<=$pages; $i++) 

      { 

       if ($i == $curpage) 

        { 

         $page_list .= "<b>".$i."</b>"; 

        } 

       else 

        { 

         $page_list .= "<a href=\"".$_SERVER['PHP_SELF']."?".$parameter."&page=".$i."\" title=\"Page ".$i."\" class=\"links\">".$i."</a>"; 

        } 

       $page_list .= " "; 

      } 



     /* Print the Next and Last page links if necessary */ 

     if (($curpage+1) <= $pages) 

      { 

       $page_list .= "<a href=\"".$_SERVER['PHP_SELF']."?".$parameter."&page=".($curpage+1)."\" title=\"Next Page\" class=\"links\">Next</a> "; 

      } 



     if (($curpage != $pages) && ($pages != 0)) 

      { 

       $page_list .= "<a href=\"".$_SERVER['PHP_SELF']."?".$parameter."&page=".$pages."\" title=\"Last Page\" class=\"links\">>></a> "; 

      } 

     $page_list .= "\n"; 



     return $page_list; 

    } 



	/*******************************************************************************

	*copy of page list function for absolute url

	********************************************************************************/

	 function pageList1($curpage, $pages,$parameter,$intCatId) 

    { 

    	 $page_list  = ""; 



     /* Print the first and previous page links if necessary */ 

     if (($curpage != 1) && ($curpage)) 

      { 

       $page_list .= "  <a href=\"show-cat-products.php?".$parameter."&page=1&catId=".$intCatId."\" title=\"First Page\" class=\"rightnavlinks\"><<</a> "; 

      } 



     if (($curpage-1) > 0) 

      { 

       $page_list .= "<a href=\"show-cat-products.php?".$parameter."&page=".($curpage-1)."&catId=".$intCatId."\" title=\"Previous Page\" class=\"rightnavlinks\">Prev</a> "; 

      } 



     /* Print the numeric page list; make the current page unlinked and bold */ 

     for ($i=1; $i<=$pages; $i++) 

      { 

       if ($i == $curpage) 

        { 

         $page_list .= "<b>".$i."</b>"; 

        } 

       else 

        { 

         $page_list .= "<a href=\"show-cat-products.php?".$parameter."&page=".$i."&catId=".$intCatId."\" title=\"Page ".$i."\" class=\"rightnavlinks\">".$i."</a>"; 

        } 

       $page_list .= " "; 

      } 



     /* Print the Next and Last page links if necessary */ 

     if (($curpage+1) <= $pages) 

      { 

       $page_list .= "<a href=\"show-cat-products.php?".$parameter."&page=".($curpage+1)."&catId=".$intCatId."\" title=\"Next Page\" class=\"rightnavlinks\">Next</a> "; 

      } 



     if (($curpage != $pages) && ($pages != 0)) 

      { 

       $page_list .= "<a href=\"show-cat-products.php?".$parameter."&page=".$pages."&catId=".$intCatId."\" title=\"Last Page\" class=\"rightnavlinks\">>></a> "; 

      } 

     $page_list .= "\n"; 



     return $page_list; 

    } 







function pageList2($curpage, $pages,$parameter,$file) 

    { 

     $page_list  = ""; 



     /* Print the first and previous page links if necessary */ 

     if (($curpage != 1) && ($curpage)) 

      { 	

       $page_list .= "  <a href=\"".$file."?".$parameter."&page=1\" title=\"First Page\" class=\"rightnavlinks\"><<</a> "; 

      } 



     if (($curpage-1) > 0) 

      { 

       $page_list .= "<a href=\"".$file."?".$parameter."&page=".($curpage-1)."\" title=\"Previous Page\" class=\"rightnavlinks\">Prev</a> "; 

      } 



     /* Print the numeric page list; make the current page unlinked and bold */ 

     for ($i=1; $i<=$pages; $i++) 

      { 

       if ($i == $curpage) 

        { 

         $page_list .= "<b>".$i."</b>"; 

        } 

       else 

        { 

         $page_list .= "<a href=\"".$file."?".$parameter."&page=".$i."\" title=\"Page ".$i."\" class=\"rightnavlinks\">".$i."</a>"; 

        } 

       $page_list .= " "; 

      } 



     /* Print the Next and Last page links if necessary */ 

     if (($curpage+1) <= $pages) 

      { 

       $page_list .= "<a href=\"".$file."?".$parameter."&page=".($curpage+1)."\" title=\"Next Page\" class=\"rightnavlinks\">Next</a> "; 

      } 



     if (($curpage != $pages) && ($pages != 0)) 

      { 

       $page_list .= "<a href=\"".$file."?".$parameter."&page=".$pages."\" title=\"Last Page\" class=\"rightnavlinks\">>></a> "; 

      } 

     $page_list .= "</td>\n"; 



     return $page_list; 

    } 

  /*********************************************************************************** 

   * string nextPrev (int curpage, int pages) 

   * Returns "Previous | Next" string for individual pagination (it's a word!) 

   ***********************************************************************************/ 

   function nextPrev($curpage, $pages,$parameter) 

    { 

     $next_prev  = ""; 



     if (($curpage-1) <= 0) 

      { 

       $next_prev .= "Previous"; 

      } 

     else 

      { 

       $next_prev .= "<a href=\"".$_SERVER['PHP_SELF']."?".$parameter."&page=".($curpage-1)."\" class=\"rightnavlinks\">Previous</a>"; 

      } 



     $next_prev .= " | "; 



     if (($curpage+1) > $pages) 

      { 

       $next_prev .= "Next"; 

      } 

     else 

      { 

       $next_prev .= "<a href=\"".$_SERVER['PHP_SELF']."?".$parameter."&page=".($curpage+1)."\" class=\"rightnavlinks\">Next</a>"; 

      } 



     return $next_prev; 

    } 



   function nextPrevCols($curpage,$pages,$parameter,$cols) 

    { 

     $next_prev  = "<td>&lt;&lt;"; 



     if (($curpage-1) <= 0) 

      { 

       $next_prev .= "Previous"; 

      } 

     else 

      { 

       $next_prev .= "<a href=\"".$_SERVER['PHP_SELF']."?".$parameter."&page=".($curpage-1)."\" class=\"rightnavlinks\">Previous</a>"; 

      } 

	 $colspan=$cols-2;

     $next_prev .= " </td><td colspan=$colspan>&nbsp;</td><td align=right> "; 



     if (($curpage+1) > $pages) 

      { 

       $next_prev .= "Next"; 

      } 

     else 

      { 

       $next_prev .= "<a href=\"".$_SERVER['PHP_SELF']."?".$parameter."&page=".($curpage+1)."\" class=\"rightnavlinks\">Next</a>"; 

      } 

     $next_prev  .= "&gt;&gt;</td>"; 



     return $next_prev; 

    } 





  } 

  

  function ExecPaging($query,$parameter,$pagesize,$pagename='')

{

  global $pagelist;

  $p=new Pager;
include("database.php");
  //$smarty = new Smarty;

  $ListRec=array();

  if(empty($_REQUEST["page"]))

	$_REQUEST["page"]=1;

  if(mysqli_num_rows(mysqli_query($dbb,$query))>0)

  {

    $num=mysqli_num_rows(mysqli_query($dbb,$query));

    if(!$pagesize)

    $pagesize=25;

    if($pagesize=="All")

    $pagesize=$num;

	$limit=$pagesize;//Defined in comon lib file

	$getpages=$p->findPages($num,$limit);

	$_GET["page"]=$_REQUEST["page"];

	if(isset($_REQUEST["page"]) and $_REQUEST["page"]>$getpages)

	{

			$_REQUEST["page"]=$getpages;

			$_GET["page"]=$getpages;

	}

	$start = $p->findStart($limit);

	$query.=" limit ".$start.",".$limit."";

	$row1=mysqli_query($dbb,$query);

	if(mysqli_num_rows($row1)>0)

	{

      while($row=mysqli_fetch_array($row1))

      {

        array_push($ListRec,$row);

      }

	if($pagename=="")

	{  

		if($num>$limit) 

			$pagelist=$p->pageList2($_REQUEST['page'],$getpages,$parameter,"News.php");

	}

	else

	{

		if($num>$limit) 

			$pagelist=$p->pageList2($_REQUEST['page'],$getpages,$parameter,$pagename);

	}

      //return array($ListRec,$pagelist);

     return ($ListRec);

    }

    else

    return 0;

  }

  else

  return 0;

  

}

?>

