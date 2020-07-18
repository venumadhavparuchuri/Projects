package com.crm.dao;

import java.util.List;

import com.crm.entity.Customer;

public interface CustomerDAO {
	
	public List<Customer> getCustomers();

	public void  saveCustomer(Customer theCustomer);

	public Customer getCustomer(int theId);

	public Customer deleteCustomer(int theId);

	public List<Customer> searchCustomers(String theSearchName);
	


}
