using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using QuanLiThuVien.Models.Entities;
using System.IO;
using QuanLiThuVien.Models.Function;

namespace QuanLiThuVien.Areas.ADMIN.Controllers
{
    public class SachController : Controller
    {
        // GET: ADMIN/Sach
        public ActionResult Index()
        {
            var sp = new SachFunction().GetSachs();
            return View(sp);
        }

        // GET: ADMIN/Sach/Details/5
        public ActionResult Details(int id)
        {

            return View();
        }

        // GET: ADMIN/Sach/Create
        public ActionResult Create()
        {
            var dao1 = new TacGiaFunction().TGs.Where(p => p.Tentacgia != null);
            ViewBag.TacgiaID = new SelectList(dao1, "TacgiaID", "tentacgia", null);
            var dao2 = new TheLoaiFunction().TLs.Where(p => p.Tentheloai != null);
            ViewBag.TheloaiID = new SelectList(dao2, "TheloaiID", "tentheloai", null);
            var dao3 = new NhaXuatBanFunction().NXBs.Where(p => p.TenNXB != null);
            ViewBag.NXBID = new SelectList(dao3, "NXBID", "tennxb", null);
            return View();
        }

        // POST: ADMIN/Sach/Create
        [HttpPost]
        public ActionResult Create(Sach model, HttpPostedFileBase file)
        {
            try
            {
                // TODO: Add insert logic here
                if (file == null)
                {
                    ModelState.AddModelError("File", "Please Upload Your file");
                }
                else if (file.ContentLength > 0)
                {                 //TO:DO
                    var fileName = Path.GetFileName(file.FileName);
                    var path = Path.Combine(Server.MapPath("~/Content/images/laptop"), fileName);
                    file.SaveAs(path);
                    //     ModelState.Clear();
                    // TODO: Add insert logic here
                    model.ImgLink = fileName;
                    SachFunction _sanphamF = new SachFunction();
                    _sanphamF.Insert(model);
                    // Upload File đẩy về Server
                }
                return RedirectToAction("Index");
            }
            catch
            {
                return View();
            }
        }

        // GET: ADMIN/Sach/Edit/5
        public ActionResult Edit(int id)
        {
            var model = new SachFunction().FindEntity(id);
            var dao = new TacGiaFunction().TGs;
            ViewBag.TacgiaID = new SelectList(dao, "TacgiaID", "Tentacgia", model.TacgiaID);
            ViewBag.Tentacgia = model.TacGia.Tentacgia;
            ViewBag.TheloaiID = new SelectList(dao, "TheloaiID", "Tentheloai", model.TheloaiID);
            ViewBag.Tentheloai = model.TheLoai.Tentheloai;
            ViewBag.NXBID = new SelectList(dao, "NXBID", "Tennxb", model.NhaxuatbanID);
            ViewBag.Tennxb = model.NhaXuatBan.TenNXB;
            var test1 = new SelectList(dao, "TacgiaID", "Tentacgia", model.TacgiaID);
            var test2 = new SelectList(dao, "TheloaiID", "Tentheloai", model.TheloaiID);
            var test3 = new SelectList(dao, "NXBID", "Tennxb", model.NhaxuatbanID);
            return View(model);
        }

        // POST: ADMIN/Sach/Edit/5
        [HttpPost]
        public ActionResult Edit(int id, Sach model, HttpPostedFileBase file)
        {
            try
            {
                // TODO: Add update logic here
                if (file == null)
                {
                    ModelState.AddModelError("File", "Please Upload Your file");
                }
                else if (file.ContentLength > 0)
                {                 //TO:DO
                    var fileName = Path.GetFileName(file.FileName);
                    var path = Path.Combine(Server.MapPath("~/Content/images/laptop"), fileName);
                    file.SaveAs(path);
                    //     ModelState.Clear();
                    // TODO: Add insert logic here
                    model.ImgLink = fileName;
                    SachFunction _sanphamF = new SachFunction();
                    _sanphamF.Update(model);
                    // Upload File đẩy về Server
                }
                return RedirectToAction("Index");
            }
            catch
            {
                return View();
            }
        }

        // GET: ADMIN/Sach/Delete/5
        public ActionResult Delete(int id)
        {
            return View();
        }
        [ChildActionOnly]
        public PartialViewResult Header()
        {
            return PartialView();
        }
        // POST: ADMIN/Sach/Delete/5
        [HttpPost]
        public ActionResult Delete(int id, Sach model)
        {
            try
            {
                // TODO: Add delete logic here
                model.SachID = id;
                var result = new SachFunction().Delete(model);
                return RedirectToAction("Index");
            }
            catch
            {
                return View();
            }
        }
    }
}
