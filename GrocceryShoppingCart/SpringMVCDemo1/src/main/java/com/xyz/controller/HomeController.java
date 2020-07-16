package com.xyz.controller;

import javax.servlet.http.HttpServletRequest;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.servlet.ModelAndView;

@Controller
public class HomeController 
{
	
	@RequestMapping("/")
   public ModelAndView indexpage()
   {
	   ModelAndView m1=new ModelAndView("index");
	   return m1;
   }
	
	@RequestMapping(value="/productpage")
	public ModelAndView viewproductpage()
	{
		ModelAndView m2=new ModelAndView("AddProduct");
		return m2;
	}

	
	@RequestMapping(value="/categorypage")
	public ModelAndView viewcategorypage()
	{
		ModelAndView m3=new ModelAndView("AddCategory");
		return m3;
	}
	@RequestMapping(value="/addcategory")
	public ModelAndView addCategoryProcess(HttpServletRequest req)
	{
		
		int cid=Integer.parseInt(req.getParameter("cid"));
		String cname=req.getParameter("cname");
		
		System.out.println("*****"+cid+""+cname);
		
		ModelAndView m4=new ModelAndView("AddCategory");
		return m4;
	}
}
