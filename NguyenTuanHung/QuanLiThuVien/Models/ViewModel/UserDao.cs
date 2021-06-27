using QuanLiThuVien.Models.Entities;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace QuanLiThuVien.Models.ViewModel
{
    public class UserDao
    {
        QuanLiThuVienDb db = null;
         public long Insert (Admin emtity)
        {
            db = new QuanLiThuVienDb();
            db.Admins.Add(emtity);
            db.SaveChanges();
            return emtity.id;
        }
        public Admin GetById(string userName)
        {
            return db.Admins.SingleOrDefault(x => x.UserName == userName);
        }
        public bool Login(String name ,string pass)
        {
            var result = db.Admins.Count(x => x.UserName == name && x.Passwword== pass);
            if (result > 0)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }
}