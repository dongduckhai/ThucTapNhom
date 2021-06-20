using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using QuanLiThuVien.Models.Entities;

namespace QuanLiThuVien.Models.Function
{
    public class AdminFunction
    {
        private QuanLiThuVienDb db;
        public AdminFunction()
        {
            db = new QuanLiThuVienDb();
        }
        public IQueryable<Admin> Admins
        {
            get { return db.Admins; }
        }
        public int Login(string name, string pass)
        {
            var result = db.Admins.FirstOrDefault(x => x.UserName == name);
            if (result == null)
            {
                return 0;
            }
            else
            {
                if (result.Passwword == pass)
                    return 1;
                else return 0;
            }
        }/*
        public Admin FindEntity(int ID_TK)
        {
            Admin dbEntry = db.Admins.Find(ID_TK);
            return dbEntry;
        }*/
        public Admin GetById(string name)
        {
            return db.Admins.SingleOrDefault(x => x.UserName == name);
        }
        public int GetId(string name)
        {
            return db.Admins.SingleOrDefault(x => x.UserName == name).id;
        }
        public bool Checkname(string name)
        {
            return db.Admins.Count(x => x.UserName == name) > 0;
        }
        public int SL_KH()
        {
            return db.TheThuViens.Count();
        }
        public int SL_SP()
        {
            return db.Saches.Count();
        }

    }
}